<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="/home" method="post" id="my-form" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" id="name" value="My Name">
            <input type="text" name="phone" id="phone" value="My Phone">
            <input type="text" name="age" id="age" value="My Ages">
            <input type="file" name="file" id="myFile">
            <div>
                <button type="submit" id="btn-submit">Submit form</button>
            </div>
        </form>
    </div>
</body>
</html>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    const formData = new FormData();

    const appendFile = () => {
        let myFile = document.getElementById('myFile').files;
        formData.append('file', myFile[0]);
    }

    const contentType = {
        headers: {
            'content-type': 'multipart/form-data'
        }
    }

    const doAjax = () => {
        axios.post('/home', formData, contentType)
        .then( response => {
            console.log(response.data);
        }).catch( error => {
            console.log(error)
        });
    }
    let btn = document.getElementById('btn-submit');
    btn.addEventListener('click', event => {
        event.preventDefault();
        appendFile();
        doAjax();
    });
</script>