<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Ship Map | Ombak Biru</title>

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .ship-map {
            width: 100%;
            height: 700px;
        }
    </style>
</head>
<body>

    <?php include __DIR__ . '/../layout/hdr.html'; ?>

    <div class="ship-map">
        <script>
            var mst_width = "100%";
            var mst_height = "100%";
            var mst_border = "0";
            var mst_map_style = "simple";
            var mst_mmsi = "";
            var mst_show_track = "";
            var mst_show_info = "1";
            var mst_fleet = "";
            var mst_lat = "";
            var mst_lng = "";
            var mst_zoom = "3";
            var mst_show_names = "1";
            var mst_scroll_wheel = "1";
            var mst_show_menu = "1";
        </script>

        <script 
            id="myshiptrackingscript" 
            src="//www.myshiptracking.com/js/widgetApi.js" 
            async 
            defer>
        </script>
    </div>

</body>
</html>