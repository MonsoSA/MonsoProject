@extends('HeadFoot')
@section('header')
    @parent
@endsection
@section('content')
	<!--End - Navbars-->

	<!--start body-->
	@if (session('status'))
		<div class="alert alert-success fade show" role="alert">
			{{ session('status') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif

	<!--End - body-->
	 <section class="header">
		<article class="container__form">
			<div class="container__form--img">
				<img class="item__form--img" src={{ asset('static/img/back-register.jpg') }} alt="Imagen de fondo">
					
				<div class="bg__product"></div>
				 
			<form class="form form__product" method="POST" 
				action="{{ url('registerProduct')}}"
				enctype="multipart/form-data"
			>
					@csrf

					<span class="form__title">Registro de producto</span>
					
					<div class="product-name">
						<input class="form__input" type="text" placeholder="Nombre de producto" name="nameProduct" id="name">
					</div>

					<div class="form__ingredients">
						@foreach($ingredients as $ingredient)
							<input class="form__ingredients--item" type="checkbox" value="{{$ingredient['id']}}"><span class="form__ingredients--item">{{$ingredient['name']}}</span></option>
						@endforeach  
					</div>


					<div class="form__description">
						<input class="form__input"  type="text" placeholder="Descripción" name="description">
					</div>


					<div class="form__quantity">
						<select class="form__select" id="quantity" name="stock">
							<option value="-1">Cantidad</option>
							<?php for($i = 0; $i <= 100; $i++): ?>
								<option value= "<?php echo $i; ?>"> <?php echo $i; ?> </option>
							<?php endfor; ?>
						</select>
					</div>


					<div class="form__price">
						<select class="form__select" id="price" name="price">
							<option value="-1">Precio</option>
							<?php for($i = 495; $i <= 13000; $i+=500): ?>
								<option value= "<?php echo $i; ?>"> <?php echo $i; ?> </option>
							<?php endfor; ?>
						</select>		
					</div>


					<div class="form__upload-image">
						<input class="form__input" type="file" placeholder="Subir imagen" name="image_path" />
					</div>

					<div class="form__action-buttons">
						<button class="form__button" type="submit" text="Registrar">Registrar</button>
					</div>
				</form>
		
			</div>
		</article>
	</section>
	<!--start Footer-->
@endsection
@section('footer')
	@parent
@endsection