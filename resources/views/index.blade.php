<!doctype html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .ck-editor__editable {
          min-height: 60vh;
      }

      button {
          padding: 8px 16px;
          background-color: #007bff;
          color: white;
          border: none;
          border-radius: 5px;
          cursor: pointer;
      }

      button:hover {
          background-color: #0056b3;
      }
  </style>
  </head>
  <body class="bg-gray-100">
    <div class="container-fluid">
      <div class="row">
        <form action="saveNoticeBoard" method="POST">
          @csrf
          <section>
              <textarea name="description" id="editor" rows="5">{{$data['ckEditerRecord']->message}}</textarea>
          </section>
          <button id="saveDescription" class="input-field bg-success" type="submit">Save Description</button>
        </form>
      </div>
    </div>
    <hr class="border border-dark">
    <h2 class="text-center text-success">These are all active works we are work on it</h2>
    <a href="./addNewCard">
      <button class="mh-2">Add New Record</button>
    </a>
    <div id="response">
    </div>
    <div class="row p-4">
      @foreach ($data['ApiRecord'] as $item)    
        <div class="col-md-4 border border-primary rounded">
          <div class="text-end">
            <a href="/delete/{{$item->id}}">
              <button class="btn bg-danger text-white">X</button>
            </a>
          </div>
          <label for="">Name</label>
          <br>
          <input type="text" name="name" value="{{ $item->name ?? "" }}" class="form-control name" data-id="{{ $item->id }}">
          <br>
          <label for="">Group Name</label>
          <br>
          <input type="text" name="group_name" value="{{ $item->group_name ?? "" }}" class="form-control group_name" data-id="{{ $item->id }}">
          <br>
          <label for="">Status</label>
          <br>
          <select id="status-1" name="status" class="form-select status" data-id="{{ $item->id }}">
            @if(isset($item->status))
              <option value="{{$item->status}}">{{$item->status}}</option>
            @endIf
            <option value="Not Finalized">Not Finalized</option>
            <option value="UI Person Finalized">UI Person Finalized</option>
            <option value="Dev in Progress">Dev in Progress</option>
            <option value="Dev Done">Dev Done</option>
            <option value="Used/Consumed">Used/Consumed</option>
            <option value="Archived">Archived</option>
            <option value="Dev Reopen">Dev Reopen</option>
            <option value="New API Created (Recreated)">New API Created (Recreated)</option>
          </select>
          <br>
          <label for="">JSON Data</label>
          <br>
          <textarea style="height: 200px" class="form-control json_data" name="json_data" placeholder="Enter your JSON data here" data-id="{{ $item->id }}">{{$item->json_data}}</textarea>
        </div>
      @endforeach
    </div>
  </div> 

  <script>
    let editorInstance;

    ClassicEditor.create(document.querySelector('#editor'))
        .then(editor => {
            editorInstance = editor;
        })
        .catch(error => {
            console.error(error);
        });

    // Add event listeners for 'name' and 'group_name' fields
    document.querySelectorAll('.name').forEach(element => {
        element.addEventListener('change', function () {
            const value = this.value;
            const dataId = this.dataset.id;
            callApi('name', value, dataId);
        });
    });

    document.querySelectorAll('.group_name').forEach(element => {
        element.addEventListener('change', function () {
            const value = this.value;
            const dataId = this.dataset.id;
            callApi('group_name', value, dataId);
        });
    });

    
    document.querySelectorAll('.status').forEach(element => {
      element.addEventListener('change', function () {
        const value = this.value;
        const dataId = this.dataset.id;
        callApi('status', value, dataId);
      });
    })
    
    document.querySelectorAll('.json_data').forEach(element => {
        element.addEventListener('change', function () {
            const value = this.value;
            const dataId = this.dataset.id;
            callApi('json_data', value, dataId);
        });
    });
    
    function callApi(key, value, id) {
        const data = {
            id: id,
            key: key,
            value: value
        };
        fetch('http://localhost:8000/api/storeApiData', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data),
        })
            .then(response => response.json())
            .then(responseData => {
              if(responseData.success){
                const alertBox = `
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        ${responseData.message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
                document.getElementById('response').innerHTML = alertBox;
              }
                // Display response in the #response element
                // document.getElementById('response').innerHTML = `
                //     <p><strong>Status:</strong> ${responseData.success ? 'Success' : 'Failed'}</p>
                //     <p><strong>Message:</strong> ${responseData.message}</p>
                // `;
                // fetchApiDetails();
            })
            .catch(error => {
                console.error('Error saving data:', error);
            });
        }
    </script>
  </body>
</html>
