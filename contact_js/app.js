$(document).ready(function(e){
    // Submit form data via Ajax
    $("#fupForm").on('submit', function(e){
        e.preventDefault();
        var fd = new FormData(this);
        var files = $('#file')[0].files;
        // console.log(files.length)
        if(files.length == 1){
             var file_value = files[0];
              fd.append('file',file_value.name);
              $.ajax({
                type: 'POST',
                url: "contactme_with_file.php",
                data:  fd,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData:false,
                success: function(response){
                    // console.log(response)
                   if(response.status == 200){
                    Swal.fire(
                        'Thank You!',
                        "Your Information Submit Sucessfully, We will give Response Soon...",
                        'success'
                      ).then(function() {
                       $("#fupForm")[0].reset();
                    });
                    //   console.log(response.message)
                      fd.append('deployurl', response.message);
                    //   confirm_mail();
                        client(fd);
                      response_mail(fd);
                   }
                   else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                      }).then(function() {
                        $("#fupForm")[0].reset();
                     });
                   }
                }
            });
        }else{
            $.ajax({
                type: 'POST',
                url: "contactme_without_file.php",
                data:  fd,
                dataType: 'json',
                contentType: false,
                cache: false,
                processData:false,
                success: function(response){
                    // console.log(response)
                   if(response.status == 200){
                    Swal.fire(
                        'Thank You!',
                        response.message,
                        'success'
                      ).then(function() {
                        $("#fupForm")[0].reset();
                     });
                  client(fd);
                  response_mail2(fd);
                   }
                   else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                      }).then(function() {
                        $("#fupForm")[0].reset();
                     });
                   }}});
}
});
function client(fd){
    $.ajax({
        type: 'POST',
        url: "./contact_js/send_to_client.php",
        data:  fd,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData:false,
        success: function(response){
console.log(response)
        }
    });
}
function response_mail(fd){
    // console.log(fd)
    $.ajax({
        type: 'POST',
        url: "./contact_js/send_us.php",
        data:  fd,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData:false,
        success: function(response){
console.log(response)
        }
    });
}
function response_mail2(fd){
    // console.log(fd)
    $.ajax({
        type: 'POST',
        url: "./contact_js/send_us_without_file.php",
        data:  fd,
        dataType: 'json',
        contentType: false,
        cache: false,
        processData:false,
        success: function(response){
console.log(response)
        }
    });
}
});

