<section id="widget-grid">
	<div class="row">
		<article class="col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable" id="widget-article">
			<div class="jarviswidget" id="widget" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
				<header>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2>Administración de Permisos</h2>
				</header>
				<div>
					<div class="widget-body">
						<div class="widget-body">
							<form class="form-horizontal" id="formCreate">
							<div class="row">
								<div class="col-md-8 col-md-offset-2">
									<fieldset>
										<section class="col col-6">
											<legend class="font-lg"> <span class="label label-info"> {{$data['grupo']->nombre_grupo}} </span> </legend>

											<input type="hidden" value="{{$data['grupo']->id}}" id="id">

											<div class="form-group">
												<div class="tree smart-form" id="modules-tree">
													<ul>
														<?php $sistemas = DB::select('SELECT id, nombre_sistema as nombre FROM adm_sistemas WHERE estatus=1'); ?>
														@foreach($sistemas as $sistema)
														<li>
															<span>
																<i class="fa fa-lg fa-plus-circle"></i>&nbsp;
																{{$sistema->nombre}}
																<span class="ch">
																	@if(in_array($sistema->id, $data['sistemas']))
																	<input type="checkbox" name="sistemas" value="{{$sistema->id}}" checked>
																	@else
																	<input type="checkbox" name="sistemas" value="{{$sistema->id}}">
																	@endif
																</span>

																<br>
																
																Asignar/Desasignar todos los permisos
																<span class="ch-all">
																	@if(in_array($sistema->id, $data['sistema-all']))
																	<input type="checkbox" name="all-permission" value="{{ $sistema->id }}" checked>
																	@else
																	<input type="checkbox" name="all-permission" value="{{ $sistema->id }}">
																	@endif
																</span>
															</span>
															<ul>
																<?php $menus = DB::select('CALL sp_menu_sidebar(?, ?, ?)', [Auth::user()->id, $sistema->id, null]); ?>
																@foreach($menus as $menu)
																<li style="display:none">									
																	<span>																
																		<i class="fa fa-lg {{$menu->icono}}"></i>&nbsp;
																		{{$menu->nombre_menu}}
																		<span class="ch">
																			@if(in_array($menu->id, $data['menus']))
																			<input type="checkbox" name="menus" value="{{$menu->id}}" checked>
																			@else
																			<input type="checkbox" name="menus" value="{{$menu->id}}">
																			@endif
																		</span>
																	</span>
																	<ul>
																		<?php $hijos = DB::select('CALL sp_menu_sidebar(?, ?, ?)', [Auth::user()->id, $sistema->id, $menu->id]); ?>
																		@foreach($hijos as $hijo)
																		<li style="display: none">
																			<span>
																				<i class="fa fa-lg fa-plus-circle"></i>&nbsp;
																				{{$hijo->nombre_menu}}
																				<span class="ch">
																					@if(in_array($hijo->id, $data['menus']))
																					<input type="checkbox" name="menus" value="{{$hijo->id}}" checked>
																					@else
																					<input type="checkbox" name="menus" value="{{$hijo->id}}">
																					@endif
																				</span>
																			</span>
																			<?php $nietos = DB::select('CALL sp_menu_sidebar(?, ?, ?)', [Auth::user()->id, $sistema->id,$hijo->id]); ?>
																			@if($nietos)
																				<ul>
																				@foreach($nietos as $nieto)
																					<li style="display: none">
																						<span>
																							<i class="fa fa-lg fa-plus-circle"></i>&nbsp;
																							{{$nieto->nombre_menu}}
																							<span class="ch">
																								@if(in_array($nieto->id, $data['menus']))
																								<input type="checkbox" name="menus" value="{{$nieto->id}}" checked>
																								@else
																								<input type="checkbox" name="menus" value="{{$nieto->id}}">
																								@endif
																							</span>
																						</span>
																						<ul>
																							<?php $permisos = DB::select('SELECT id, tipo FROM adm_funciones WHERE modulo=? AND id_sistema=?', [$nieto->nombre, $sistema->id]); ?>
																							@foreach($permisos as $permiso)
																							<li style="display:none">
																								<span>
																									<label class="checkbox inline-block">
																										@if(in_array($permiso->id, $data['asignados']))
																										<input type="checkbox" name="permisos" value="{{$permiso->id}}" checked>
																										@else
																										<input type="checkbox" name="permisos" value="{{$permiso->id}}">
																										@endif
																										<i></i> {{$permiso->tipo}}
																									</label>
																								</span>
																							</li>
																							@endforeach
																							<?php $modulos = DB::select('SELECT DISTINCT modulo FROM adm_funciones WHERE padre=? AND id_sistema=? ORDER BY modulo', [$nieto->nombre, $sistema->id]); ?>
																							@foreach($modulos as $modulo)
																							<li style="display: none"><span><i class="fa fa-lg fa-plus-circle"></i>&nbsp; {{$modulo->modulo}}</span>
																							<ul>
																								<?php $permisos = DB::select('SELECT id, tipo FROM adm_funciones WHERE modulo=? AND id_sistema=? ORDER BY tipo', [$modulo->modulo, $sistema->id]); ?>
																								@foreach($permisos as $permiso)
																								<li style="display:none">
																									<span>
																										<label class="checkbox inline-block">
																											@if(in_array($permiso->id, $data['asignados']))
																											<input type="checkbox" name="permisos" value="{{$permiso->id}}" checked>
																											@else
																											<input type="checkbox" name="permisos" value="{{$permiso->id}}">
																											@endif
																											<i></i> {{$permiso->tipo}}
																										</label>
																									</span>
																								</li>
																								@endforeach
																							</ul></li>
																							@endforeach
																						</ul>
																					</li>
																				@endforeach
																				</ul>
																			@else
																				@if($hijo->nombre_menu == "Reportes" || $hijo->nombre_menu == "Reportes Oficiales")
																					<?php $permisos = DB::select('SELECT id, modulo FROM adm_funciones WHERE padre=?', [$hijo->nombre]); ?>
																					<ul>
																						@foreach($permisos as $permiso)
																						<li style="display: none">
																							<span>
																								<label class="checkbox inline-block">
																									@if(in_array($permiso->id, $data['asignados']))
																									<input type="checkbox" name="permisos" value="{{$permiso->id}}" checked>
																									@else
																									<input type="checkbox" name="permisos" value="{{$permiso->id}}">
																									@endif
																									<i></i>&nbsp; {{$permiso->modulo}}
																								</label>
																							</span>
																						</li>
																						@endforeach
																					</ul>
																				
																					</ul>
																				@else
																				<ul>
																					<?php $permisos = DB::select('SELECT id, tipo FROM adm_funciones WHERE modulo=? ORDER BY tipo', [$hijo->nombre_menu]); ?>
																					@foreach($permisos as $permiso)
																					<li style="display:none">
																						<span>
																							<label class="checkbox inline-block">
																								@if(in_array($permiso->id, $data['asignados']))
																								<input type="checkbox" name="permisos" value="{{$permiso->id}}" checked>
																								@else
																								<input type="checkbox" name="permisos" value="{{$permiso->id}}">
																								@endif
																								<i></i>&nbsp; {{$permiso->tipo}}
																							</label>
																						</span>
																					</li>
																					@endforeach
																				</ul>
																				@endif
																			@endif
																		</li>																
																		@endforeach
																	</ul>
																	<ul>
																		<?php $permisos = DB::select('SELECT id, tipo FROM adm_funciones WHERE modulo=? ORDER BY tipo', [$menu->nombre_menu]); ?>
																		@foreach($permisos as $permiso)
																		<li style="display:none">
																			<span>
																				<label class="checkbox inline-block">
																					@if(in_array($permiso->id, $data['asignados']))
																					<input type="checkbox" name="permisos" value="{{$permiso->id}}" checked>
																					@else
																					<input type="checkbox" name="permisos" value="{{$permiso->id}}">
																					@endif
																					<i></i>&nbsp; {{$permiso->tipo}}
																				</label>
																			</span>
																		</li>
																		@endforeach
																	</ul>
																</li>
																@endforeach
															</ul>
														</li>
														@endforeach
													</ul>
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

<script src="/js/administracion/permisos/init.js"></script>
<script>
	$('.tree > ul').attr('role', 'tree').find('ul').attr('role', 'group');
	$('.tree').find('li:has(ul)').addClass('parent_li').attr('role', 'treeitem').find(' > span').attr('title', 'Collapse this branch').on('click', function(e) {
		var children = $(this).parent('li.parent_li').find(' > ul > li');
		if (children.is(':visible')) {
			children.hide('fast');
			$(this).attr('title', 'Expand this branch').find(' > i').removeClass().addClass('fa fa-lg fa-plus-circle');
		} else {
			children.show('fast');
			$(this).attr('title', 'Collapse this branch').find(' > i').removeClass().addClass('fa fa-lg fa-minus-circle');
		}
		e.stopPropagation();
	});	
</script>
<script>
	$(".breadcrumb").html("<li>Inicio</li><li>Administración</li><li>Permisos</li>");
</script>