<div class="modal fade" id="modal_export">
	<div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
            	<button class="close" data-dismiss="modal">
                	&times;
                </button>
            	<h4 class="modal-title" align="center">Cetak</h4>
            </div>
            <form method="POST" id="form_export_excel"></form>
            <form method="POST" id="form_export"></form>
            <div class="modal-body" align="center">
            	<button class="btn btn-success btn-sm excel" title="Export ke Excel" type="submit" form="form_export_excel" > 	 	
                    <i class="glyphicon glyphicon-export"></i> Excel
                </button>
    			<button class="btn btn-danger btn-sm pdf" title="Export ke PDF" target="_blank" type="submit" form="form_export"> 	 	
                    <i class="glyphicon glyphicon-export"></i>  PDF
                </button>
            </div>
        </div>
    </div>
</div>