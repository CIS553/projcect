    function addRow(tableId) {
        var table = document.getElementById(tableId);
        var row = table.insertRow(-1);
        var rowCount = table.rows.length;
        var alphanumericPattern = '[a-zA-Z0-9 ]+';
        
        if (tableId=="skills"){
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            cell1.innerHTML = '<input type="text"  required name="empskill[]">';
            cell2.innerHTML = "<select required name='skilllevel[]'><option value='1'>Low - 1</option><option value='2'>2</option> <option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>High - 10</option></select>";
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
            
            cell1.innerHTML = '<input type="date" name="cwhstart[]" required value="">';
            cell2.innerHTML = '<input type="date" name="cwhend[]" value="">';
            cell3.innerHTML = '<input type="text" name="cwhtitle[]" required pattern="'+alphanumericPattern+'" value="">';
            cell4.innerHTML = '<input type="text" name="cwhcountry[]" required pattern="'+alphanumericPattern+'" value="">';
            cell5.innerHTML = '<input type="text" name="cwhdescription[]" required pattern="'+alphanumericPattern+'" value="">';
            cell6.innerHTML = '<input type="text" name="cwhlevel[]" required pattern="'+alphanumericPattern+'" value="">';
            cell7.innerHTML = '<input type="text" name="cwhregion[]" required pattern="'+alphanumericPattern+'"  value="">';
            cell8.innerHTML = '<input type="text" name="cwhskillteam[]" required pattern="'+alphanumericPattern+'"  value="">';
            cell9.innerHTML = '<input type="text" name="cwhskillsused[]" required pattern="'+alphanumericPattern+'"  value="">';
        }
        
            if (tableId=="nonworkTable"){
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            var cell7 = row.insertCell(6);
            
            cell1.innerHTML = '<input type="date" name="ncwhstart[]" required value="">';
            cell2.innerHTML = '<input type="date" name="ncwhend[]" value="">';
            cell3.innerHTML = '<input type="text" name="ncwhtitle[]" required pattern="'+alphanumericPattern+'" value="">';
            cell4.innerHTML = '<input type="text" name="ncwhcompany[]" required pattern="'+alphanumericPattern+'" value="">';
            cell5.innerHTML = '<input type="text" name="ncwhdescription[]" required pattern="'+alphanumericPattern+'" value="">';
            cell6.innerHTML = '<input type="text" name="ncwhskillteam[]" required pattern="'+alphanumericPattern+'" value="">';
            cell7.innerHTML = '<input type="text" name="ncwhskillsused[]" required pattern="'+alphanumericPattern+'" value="">';
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
