<!DOCTYPE html>
<htmL>
    <head>
        <title>Test Json</title>

    </head>
    <body>

        <input id="showForm" type="button" name="showForm" value="Form1">
        <div id="questionContainer" style="margin-left:-100px">

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script type="text/javascript">
            $('#showForm').on("click",function() {
                $('#questionContainer').animate({'margin-left': '0px'});
                jQuery.ajax({
                    type: "GET",
                    url: "questionList.json",
                    dataType: "text",
                    success:function(res) {
                        var data = JSON.parse(res);
                        var question = $('#questionContainer');
                        var results = "";
                        for(var q in data) {
                            results += (
                                data[q].question + "<br />"
                                + '<input id=answer-'+data[q].id+'" type="text" name="answer"><br/>'
                            );
                        }
                        question.html(results);
                    },
                    error:function(xhr,ajaxOptions,thrownError) {
                        alert(thrownError);
                    }
                });
            });
        </script>
    </body>
</htmL>