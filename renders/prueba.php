<!DOCTYPE html>
<html>
<head>
<title>Dive Into Dijit Forms Examples</title>

<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/dojo/1.6.1/dojo/resources/dojo.css">
<link rel="stylesheet" id="themeStyles" href="http://ajax.googleapis.com/ajax/libs/dojo/1.6.1/dijit/themes/claro/claro.css">
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/dojo/1.6.1/dojox/grid/resources/claroGrid.css">
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/dojo/1.6.1/dojox/form/resources/CheckedMultiSelect.css">

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/dojo/1.6.1/dojo/dojo.xd.js" djConfig="isDebug:true"></script>

<script type="text/javascript">
  require(["dijit/Dialog", "dijit/form/TextBox", "dijit/form/Button"]);
</script>
</head>

<body class="claro">
<div data-dojo-type="dijit/Dialog" data-dojo-id="myDialog" title="Name and Address">
    <table class="dijitDialogPaneContentArea">
        <tr>
            <td><label for="name">Name:</label></td>
            <td><input data-dojo-type="dijit/form/TextBox" name="name" id="name"></td>
        </tr>
        <tr>
            <td><label for="address">Address:</label></td>
            <td><input data-dojo-type="dijit/form/TextBox" name="address" id="address"></td>
        </tr>
    </table>

    <div class="dijitDialogPaneActionBar">
        <button dojoType="dijit.form.Button" type="submit" id="ok">OK</button>
        <button dojoType="dijit.form.Button" type="button" onClick="myDialog.onCancel();"
                id="cancel">Cancel</button>
    </div>
</div>

<button data-dojo-type="dijit/form/Button" type="button" onClick="myDialog.show();">
    Show me!
</button>
</body>
</body>
</html>