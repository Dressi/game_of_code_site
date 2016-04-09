function onSubmit() {
    this.$('.greetings').hide();
    this.$('.preview_block').show();
    videochecker();
}

function videochecker() {
    var uniqueId = $.cookie('unique_id');
    console.log(uniqueId);

    $.ajax({
        url:'http://13.79.162.9/videos/'+uniqueId+'.mp4',
        type:'HEAD',
        error: function()
        {
            setTimeout(videochecker, 5000);
        },
        success: function()
        {
            $('#preview').attr('src', 'http://13.79.162.9/videos/'+uniqueId+'.mp4').show().attr('autoplay', true);
            $('.background').hide();
        }
    });
}