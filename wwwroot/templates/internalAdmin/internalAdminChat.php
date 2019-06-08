<div id="page-container"></div>
<script>
    $( document ).ready(function() {
        let w = $('.tab-content').width();
        let h = 800;
        flashembed("page-container",
            {
                "src": "<?=PROJECT_HTTP_ROOT?>chattool/chattool.swf",
                "version": [11, 0],
                "expressInstall": "<?=PROJECT_HTTP_ROOT?>swf_global/expressInstall.swf",
                "width": w,
                "height": h,
                "wmode": "window",
                "bgcolor": "#000000",
                "id": "chattool"
            },
            {
                "server": "127.0.0.1"
            });
    });

</script>
