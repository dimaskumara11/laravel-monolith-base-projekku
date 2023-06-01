$("#alert_message_notification").click(function () {
    $(this).fadeOut()
})

function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("myTable");
    switching = true;
    //Set the sorting direction to ascending:
    dir = "asc"; 
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
      //start by saying: no switching is done:
      switching = false;
      rows = table.rows;
      /*Loop through all table rows (except the
      first, which contains table headers):*/
      for (i = 1; i < (rows.length - 1); i++) {
        //start by saying there should be no switching:
        shouldSwitch = false;
        /*Get the two elements you want to compare,
        one from current row and one from the next:*/
        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];
        /*check if the two rows should switch place,
        based on the direction, asc or desc:*/
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            //if so, mark as a switch and break the loop:
            shouldSwitch= true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            //if so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        /*If a switch has been marked, make the switch
        and mark that a switch has been done:*/
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        //Each time a switch is done, increase this count by 1:
        switchcount ++;      
      } else {
        /*If no switching has been done AND the direction is "asc",
        set the direction to "desc" and run the while loop again.*/
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
}

function datatable_edit(table1) {
  $('#table').on( 'click', 'tr td .edit-action-1', function () {
    var data = table1.bootstrapTable('getRowByUniqueId', $(this).data("id"))
    for (let index = 0; index < columns_form.length; index++) {
      const element = columns_form[index];
      $(`#myForm1 [name="`+element+`"]`).val(data[element])
    }
  });
}

function datatable_edit_1(table2) {
  $('#table1').on( 'click', 'tr td .edit-action-1', function () {
    var data = table2.bootstrapTable('getRowByUniqueId', $(this).data("id"))
  
    for (let index = 0; index < columns_form_1.length; index++) {
      const element = columns_form_1[index];
      $(`#myForm2 [name="`+element+`"]`).val(data[element])
    }
  });
}

function datatable_edit_2(table3) {
  $('#table1').on( 'click', 'tr td .edit-action-1', function () {
    var data = table3.bootstrapTable('getRowByUniqueId', $(this).data("id"))
  
    for (let index = 0; index < columns_form_2.length; index++) {
      const element = columns_form_2[index];
      $(`#myForm2 [name="`+element+`"]`).val(data[element])
    }
  });
}

function datatable_edit_custom(tableClass, columnsForm, elmTable, elmForm) {
  $(elmTable).on( 'click', 'tr td .edit-action-1', function () {
    var data = tableClass.bootstrapTable('getRowByUniqueId', $(this).data("id"))
  
    for (let index = 0; index < columnsForm.length; index++) {
      const element = columnsForm[index];
      $(elmForm+` [name="`+element+`"]`).val(data[element])
    }
  });
}

function datatable_delete(table1) {
  $('#table').on( 'click', 'tr td .delete-action-1', function () {
    if(confirm(`are you sure?`)){
      var data = table1.bootstrapTable('getRowByUniqueId', $(this).data("id"))
      requestDelete(data)
    }
  });
}

function datatable_delete_1(table2) {
  $('#table1').on( 'click', 'tr td .delete-action-1', function () {
    if(confirm(`are you sure?`)){
      var data = table2.bootstrapTable('getRowByUniqueId', $(this).data("id"))
      requestDelete1(data)
    }
  });
}

function datatable_delete_2(table3) {
  $('#table1').on( 'click', 'tr td .delete-action-1', function () {
    if(confirm(`are you sure?`)){
      var data = table3.bootstrapTable('getRowByUniqueId', $(this).data("id"))
      requestDelete2(data)
    }
  });
}

function form_cancel() {
  $(".cancel-submit").click(function () {
    for (let index = 0; index < columns_form.length; index++) {
      const element = columns_form[index];
      $(`#myForm1 [name="`+element+`"]`).val("")
    }
  })
}

function form_cancel_1() {
  $(".cancel-submit-1").click(function () {
    for (let index = 0; index < columns_form_1.length; index++) {
      const element = columns_form_1[index];
      $(`#myForm2 [name="`+element+`"]`).val("")
    }
  })
}

function clear_form_custom(elm, data) {
  for (let index = 0; index < data.length; index++) {
    const element = data[index];
    $(elm+` [name="`+element+`"]`).val("")
  }
}

function default_image_filepond_1(filename){
  if(filename == null){
    pond.files = []
  }else{
    pond.files = [
        {
            source: filename,
            options: {
                type: 'local'
            }
        }
    ];
  }
}

function default_image_filepond_2(ponds, filename){
  if(filename == null){
    ponds.files = []
  }else{
    ponds.files = [
        {
            source: filename,
            options: {
                type: 'local'
            }
        }
    ];
  }
}

function default_image_filepond_3(ponds, filename){
  if(filename == null){
    ponds.files = []
  }else{
    var files_image = []
    for (let index = 0; index < filename.length; index++) {
      files_image.push(
        {
            source: filename[index],
            options: {
                type: 'local'
            }
        }
      )
    }
    ponds.files = files_image
  }
}


function export_excel_datatable_custom($elmClickExport, $htmlTable){
  $(function() {
    $($elmClickExport).click(function(e){
      var table = $($htmlTable);
      if(table && table.length){
        $(table).table2excel({
          exclude: ".noExl",
          name: "Report",
          filename: "File" + new Date().toISOString().replace(/[\-\:\.]/g, "") + ".xls",
          fileext: ".xls",
          exclude_img: true,
          exclude_links: true,
          exclude_inputs: true,
          preserveColors: false
        });
      }
    });
    
  });
}

var dengan_rupiah = document.getElementsByClassName('dengan-rupiah');
$('.dengan-rupiah').keyup(function(){
  $(this).val(formatRupiah($(this).val(),'Rp '))
})

/* Fungsi */
function formatRupiah(angka, prefix)
{
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split    = number_string.split(','),
        sisa     = split[0].length % 3,
        rupiah     = split[0].substr(0, sisa),
        ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
        
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
}

function loopClassForChangeFormatNumber(){
  var slides = document.getElementsByClassName("dengan-rupiah");
  for (var i = 0; i < slides.length; i++) {
    slides.item(i).value = formatRupiah(slides.item(i).value,'Rp ')
  }
}

function defaultQtyIs1(){
  $(`[name="qty"]`).val(1)
}