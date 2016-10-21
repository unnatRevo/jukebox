<html>
  <head>
    <title>Popup test</title>
  </head>
  <body>

    <script language="javascript" type="text/javascript">
      function fileUploadPopup(url) {
      	newwindow=window.open(url,'TestName','height=500,width=800');
      	if (window.focus) {newwindow.focus()}
      	return false;
      }
      // -->
    </script>

    <a href="test2.php" onclick="return fileUploadPopup('test2.php')" type="popup">
      Link to popup</a>
    <button id="btntest" name="btnTest" onclick="test();">Go</button>
  </body>
</html>
