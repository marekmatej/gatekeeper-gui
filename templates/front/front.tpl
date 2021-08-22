{extends file="front/layout.tpl"}

{block name=content}
    {include file="front/_login.tpl"}
{/block}

{block name=scripts}
    <script>

        var wwwRoot = '{$wwwRoot}';

        $(function () {

            var $pin = $('#pin');
            var responseElement = document.getElementById('response');

            $pin.keyup(function (e) {
                if ($pin.val().length >= 4) {
                    $(this.form).submit();
                }
            });

            $("button.btn-close").click(function () {
                responseElement.style.display = "none";
            });

            $("form").submit(function (event) {

                var formData = {
                    pin: $pin.val(),
                };

                $.ajax({
                    type: "POST",
                    url: wwwRoot + "auth.php",
                    data: formData,
                    dataType: "json",
                    encode: true,
                }).done(function (data) {

                    $pin.val('');
                    if (data.auth) {
                        $(location).attr('href', wwwRoot);
                    } else {

                        responseElement.style.display = "block";

                        setTimeout(function () {
                            responseElement.style.display = "none";
                        }, 3000);

                    }
                });

                event.preventDefault();
            });

        });

    </script>
{/block}
