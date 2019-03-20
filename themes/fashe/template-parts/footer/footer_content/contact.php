<div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
    <h4 class="s-text12 p-b-30">
        Newsletter
    </h4>

    <?php $data_newletter_submit = isset($_GET['mailpoet_success']) ? 'mailpoet_success' : 'mailpoet_error';?>

    <form target="_self" method="post" action="http://fashe.me/wp-admin/admin-post.php?action=mailpoet_subscription_form"  novalidate="" id="newsletter" data-newletter-submit="<?php echo $data_newletter_submit ;?>">
        <input type="hidden" name="data[form_id]" value="2">
        <input type="hidden" name="token" value="e8c235a205">
        <input type="hidden" name="api_version" value="v1">
        <input type="hidden" name="endpoint" value="subscribers">
        <input type="hidden" name="mailpoet_method" value="subscribe">

        <div class="effect1 w-size9">
            <input type="email" class="s-text7 bg6 w-full p-b-5" name="data[form_field_ZW1haWw=]" placeholder="email@example.com" value="" data-automation-id="form_email" data-parsley-required="true" data-parsley-minlength="6" data-parsley-maxlength="150" data-parsley-error-message="Please specify a valid email address." data-parsley-required-message="This field is required.">
            <span class="effect1-line"></span>
        </div>

        <div class="w-size2 p-t-20">
            <!-- Button -->
            <button  class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4 ">
                Subscribe
                <input type="submit" class="mailpoet_submit" value="Subscribe!" data-automation-id="subscribe-submit-button" hidden>
            </button>
            <span class="mailpoet_form_loading">
                <span class="mailpoet_bounce1"></span>
                <span class="mailpoet_bounce2"></span>
                <span class="mailpoet_bounce3"></span>
            </span>
        </div>

        <div class="mailpoet_message">
            <p class="mailpoet_validate_success" style="display:none;">Check your inbox or spam folder to confirm your subscription.</p>
            <p class="mailpoet_validate_error" style="display:none;" >An error occurred, make sure you have filled all the required fields.</p>
        </div>
    </form>

    <script>
        $(document).ready(function () {
            var new_letter_submit = $('#newsletter').attr('data-newletter-submit');
            if(typeof new_letter_submit !=='undefined' && new_letter_submit === 'mailpoet_success'){
                $('.mailpoet_message').html('<p style="color: darkblue">We are considering your offer!</p>')
            }
        })
    </script>

</div>