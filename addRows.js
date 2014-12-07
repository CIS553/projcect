
    function addRow(tableId) {
        var table = document.getElementById(tableId);
        var row = table.insertRow(-1);
        var rowCount = table.rows.length;
        
        if (tableId=="skills"){
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            cell1.innerHTML = '<input type="text" name="empskill[]">';
            cell2.innerHTML = "<select name='skilllevel[]'><option value='1'>Low - 1</option><option value='2'>2</option> <option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>High - 10</option></select>";
        }
        
        
        if (tableId=="workTable"){
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            var cell7 = row.insertCell(6);
            var cell8 = row.insertCell(7);
            var cell9 = row.insertCell(8);
            
            cell1.innerHTML = '<input type="date" name="cwhstart[]" value="">';
            cell2.innerHTML = '<input type="date" name="cwhend[]" value="">';
            cell3.innerHTML = '<input type="text" name="cwhtitle[]" value="">';
            cell4.innerHTML = '<input type="text" name="cwhcountry[]" value="">';
            cell5.innerHTML = '<input type="text" name="cwhdescription[]" value="">';
            cell6.innerHTML = '<input type="text" name="cwhlevel[]" value="">';
            cell7.innerHTML = '<input type="text" name="cwhregion[]" value="">';
            cell8.innerHTML = '<input type="text" name="cwhskillteam[]" value="">';
            cell9.innerHTML = '<input type="text" name="cwhskillsused[]" value="">';
        }
        
            if (tableId=="nonworkTable"){
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            var cell7 = row.insertCell(6);
            
            cell1.innerHTML = '<input type="date" name="ncwhstart[]" value="">';
            cell2.innerHTML = '<input type="date" name="ncwhend[]" value="">';
            cell3.innerHTML = '<input type="text" name="ncwhtitle[]" value="">';
            cell4.innerHTML = '<input type="text" name="ncwhcompany[]" value="">';
            cell5.innerHTML = '<input type="text" name="ncwhdescription[]" value="">';
            cell6.innerHTML = '<input type="text" name="ncwhskillteam[]" value="">';
            cell7.innerHTML = '<input type="text" name="ncwhskillsused[]" value="">';
        }
            if (tableId=="educationTable"){
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            
            cell1.innerHTML = '<input type="date" name="edstart[]" value="">';
            cell2.innerHTML = '<input type="date" name="edend[]" value="">';
            cell3.innerHTML = '<input type="text" name="edschool[]" value="">';
            cell4.innerHTML = '<input type="text" name="eddegree[]" value="">';
            cell5.innerHTML = '<input type="text" name="edmajor[]" value="">';
            cell6.innerHTML = '<input type="text" name="edminor[]" value="">';
        }
    }            