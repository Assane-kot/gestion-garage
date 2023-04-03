<SCRIPT language="javascript">
    function addRow(tableID) {

        var table = document.getElementById(tableID);

        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);

        var colCount = table.rows[0].cells.length;

        for (var i = 0; i < colCount; i++) {

            var newcell = row.insertCell(i);

            newcell.innerHTML = table.rows[1].cells[i].innerHTML;
            //alert(newcell.childNodes);
            switch (newcell.childNodes[0].type) {
                case "text":
                    newcell.childNodes[0].value = "";
                    break;
                case "checkbox":
                    newcell.childNodes[0].checked = false;
                    break;
                case "select-one":
                    newcell.childNodes[0].selectedIndex = 0;
                    break;
            }
        }
    }

    function deleteRow(tableID) {
        try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;

            for (var i = 0; i < rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[0].childNodes[0];
                if (null != chkbox && true == chkbox.checked) {
                    if (rowCount <= 1) {
                        alert("On ne peut pas supprimer toutes les lignes.");
                        break;
                    }
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }


            }
        } catch (e) {
            alert(e);
        }
    }

    function change_case(ceci) {
        ceci.parentNode.childNodes[2].disabled = (ceci.checked) ? false : true;

    }
</SCRIPT>






<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="donnees">
            <TABLE id="dataTable" style="background-color: transparent">

                <th> Pièce : </th>
                <th class="control-label col-md-2 col-sm-2 col-xs-2"> Quantité : </th>

                <tr>
                    <td><select class="select2_single form-control" tabindex="-1" name="choixp[]">

                            <option value="10000">Choix pièce</option>
                            <?php $reqp = mysqli_query($connection, "SELECT empl,pc.id idpc,p.libelle pie,p.ref refp,c.libelle cen,qte,qtea FROM `centres` c,`pieces` p,`ligne_pc` pc where pc.idpi=p.idpi and pc.idc=c.idc and  pc.`idc` = '" . $_SESSION['idc'] . "'");
                            while ($resultp = @mysqli_fetch_array($reqp)) {

                            ?>

                                <option value="<?php echo $resultp['idpc']; ?>"><?php echo $resultp['refp']; ?> - <?php echo $resultp['pie']; ?> |<?php echo $resultp['cen']; ?></option>
                            <?php
                            }
                            ?>

                        </select>
                    </td>
                    <td><INPUT type="text" class="form-control col-md-6 col-xs-12" name="case1[]" /></td>

                </tr>

            </TABLE>
        </div>
        </br>
        <div class="boutons">
            <INPUT type="button" style="width: 170px;left: 168px;position:absolute" class="greenButton" value="Ajouter une ligne" onclick="addRow('dataTable')" />
        </div>
    </div>
</div>