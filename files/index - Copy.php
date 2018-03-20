var recaptchaScriptLoaded = false;
var recaptchaAjaxReady = false;

function recaptchaOnload()
{
    recaptchaScriptLoaded = true;
    recaptchaRender();
}

function recaptchaRender() {
    if (recaptchaScriptLoaded && recaptchaAjaxReady)
    {
        grecaptcha.render('g-recaptcha', {
            'sitekey' : 'my-site-key'
        });
    }
}

$(document).ready(function () {
    $.ajax({
        url: 'my-sample-form.html'
    }).done(function (data) {
        $("#form-box").html(data);
            recaptchaAjaxReady = true;
            recaptchaRender();
    }).fail(function (jqXHR, textStatus, errorThrown) {
        ...
    });
});

<script src="https://www.google.com/recaptcha/api.js?onload=recaptchaOnload&render=explicit" async defer></script>
