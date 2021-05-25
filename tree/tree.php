<!DOCTYPE html> 
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Resize Example</title>
    <link rel="stylesheet" href="ui-lightness/jquery-ui-1.10.2.custom.css" />
    <script type="text/javascript" src="jquery-1.9.1.js"></script>
    <script type="text/javascript" src="jquery-ui-1.10.2.custom.min.js"></script>

    <script  type="text/javascript" src="primitives.min.js?2020"></script>
    <link href="primitives.latest.css?2020" media="screen" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="famdata.js"></script>
	<script src="jquery.ui.touch-punch.min"></script>
	
	<style>#draggable {cursor: help;}       </style>
<script>$(function() {$( "#draggable" ).draggable();        });</script>

    <script type="text/javascript">
        jQuery(document).ready(function () {
            var options = new primitives.orgdiagram.Config();

            options.items = famdata;
			
			

            options.cursorItem = null;
            options.hasSelectorCheckbox = primitives.common.Enabled.False;
            options.hasButtons = primitives.common.Enabled.False;
            options.pageFitMode = primitives.common.PageFitMode.PrintPreview;
            options.elbowType = primitives.common.ElbowType.Round;
            options.normalLevelShift = 20;
            options.dotLevelShift = 20;
            options.lineLevelShift = 24;
            options.normalItemsInterval = 10;
            options.dotItemsInterval = 1;
            options.lineItemsInterval = 1;
            options.linesWidth = 1;
            options.linesColor = "#7C8993";
        
			
			
            jQuery("#diagram").famDiagram(options);

			
			
            var placeholder = jQuery(".placeholder");
            jQuery("#diagram").css({
                width: placeholder.width() + 10,
                height: placeholder.height() + 10,
            })
            jQuery("#diagram").famDiagram("update");
			
			
			

        });
		

    </script>
</head>
<body>
<div class="container">
	<div id="draggable" class="ui-widget-content ui-draggable">
    <div id="diagram" style="width:1000px; height:1000px"></div>
	</div>
	</div>
</body>
</html>
