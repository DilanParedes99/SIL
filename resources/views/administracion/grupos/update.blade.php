<section id="widget-grid">
	<div class="row">
		<article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable" id="widget-article">
			<div class="jarviswidget" id="widget" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Editar Grupo</h2>
				</header>
				<div>
					<div class="widget-body">
						<div class="widget-body">
							<form class="form-horizontal" id="frmUpdate">
							<div class="row">
								<div class="col-md-8 col-md-offset-2">
									<fieldset>
										<section class="col col-6">
											<legend></legend>
											<input type="hidden" name="id" value="{{$grupo->id}}">
											<div class="form-group">
												<label class="control-label col-md-4">Nombre Grupo</label>
												<div class="col-md-8">
													<input type="text" class="form-control" id="in_nombre" name="nombre_grupo" value="{{$grupo->nombre_grupo}}">
												</div>
											</div>

										</section>
									</fieldset>
								</div>
							</div>

							<div class="form-actions">
								<div class="row">
									<div class="col-md-12">
										<a class="btn btn-labeled btn-danger btnCancel" id="btnCancel" href="/#/adm-grupos">
											<span class="btn-label"><i class="glyphicon glyphicon-arrow-left"></i></span>
											Regresar
										</a>
										<button class="btn btn-labeled btn-primary" type="button" id="btnUpdate">
											<span class="btn-label"><i class="glyphicon glyphicon-ok"></i></span>
											Guardar
										</button>
									</div>
								</div>
							</div>							
							</form>
						</div>
					</div>
				</div>
			</div>
		</article>
	</div>
</section>
<script src="/js/administracion/grupos/init.js"></script>
<script>
	init.validateCreate($('#frmUpdate'));
</script>