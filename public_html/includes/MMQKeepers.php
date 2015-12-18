<div id='messageBoxId' name='messageBoxId'></div>

  <div id="Table_Container" style="float:left" >
	<div id="Table Header" style="float:left">
		<div id="Last Modified Info" >  
		<?php
			$filename = './data/2015Keepers.JSON';
			if (file_exists($filename)) {
				echo "Data was last modified: " . date ("F d Y H:i:s.", filemtime($filename));
			}
		?>
		</div>
	</div>
	<br>
	<div id="blank_spot">
	<table id="example" class="table">
        <thead>
            <tr>
				<th>Team</th>
				<th>Player</th>
                <th>Last Year Cost</th>
				<th>ESPN ADV</th>
                <th>2015 Keeper Cost</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Team</th>
				<th>Player</th>
                <th>Last Year Cost</th>
				<th>ESPN ADV</th>
                <th>2015 Keeper Cost</th>
            </tr>
        </tfoot>
    </table>
	
	
	</div>
  </div>
  
