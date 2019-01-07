<script type="text/javascript">
  google.charts.load('current', {'packages':['table']});
  google.charts.setOnLoadCallback(drawTable);

  function drawTable() {
    var data = new google.visualization.DataTable();
    
    data.addColumn('timeofday', 'Horario');
        data.addColumn('number', 'PABX');
        data.addColumn('number', 'Realizada');
        data.addColumn('number', 'Não Realizada');
        data.addColumn('number', 'Reagendada');

      data.addRows([
        <?php $k=0; for ($i=8; $i <= 19; $i++) { ?>             
        
        [{v: [<?php echo str_replace(":",",",$novo[$i]['calldate']) ?>], f: '<?php $nl = explode(":",$novo[$i]['calldate']); echo $nl[0]."h"?>'},
            <?php $n1=$novo[$i]['numero_de_ligacoes']; echo $n1 ?>,
            <?php $n2=$novoArrayCRM[$i]['numero_de_ligacoes']; echo $n2 ?>,
            <?php $n2=$novoArrayCRM_N_R[$i]['numero_de_ligacoes']; echo $n2 ?>,
            <?php $n2=$novoArrayCRM_Reagendadas[$i]['numero_de_ligacoes']; echo $n2 ?>
        ],
       
       <?php $k++;   } ?>
      ]);

    var table = new google.visualization.Table(document.getElementById('charts_table'));

    table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
  }
</script>