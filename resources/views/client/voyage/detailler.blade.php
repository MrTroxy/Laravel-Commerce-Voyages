@extends('./client/template')
@section('titre')
   YvanDesVoyages-Détails Voyage
@endsection
@section('contenu')
<div class="single single-product woocommerce woocommerce-page">
<div id="page">
	<div class="container">
		
		<!-- #masthead -->
		<div id="content" class="site-content">
			<div id="primary" class="content-area column full">
				<main id="main" class="site-main" role="main">
				<div id="container">
					<div id="content" role="main">
						<nav class="woocommerce-breadcrumb" itemprop="breadcrumb"><a href="{{route('voyage.afficher')}}">Voyages</a> / <a href="{{ $unVoyage->id }}">{{$unVoyage->nomVoyage}}</a></nav>
						<div itemscope itemtype="http://schema.org/Product" class="product">
							<div class="images">
								<a href="" itemprop="image" class="woocommerce-main-image zoom" title="" data-rel="prettyPhoto">								
								<img src="{{$unVoyage->imgLink}}" alt=""></a>
							</div>
							<div class="summary entry-summary">
								<h1 itemprop="name" class="product_title entry-title">{{$unVoyage->nomVoyage}}</h1>
								<div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
									<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
									<a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<span itemprop="reviewCount" class="count">2</span> customer reviews)</a>
								</div>
								<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
									<p class="price">
										<span class="amount">${{$unVoyage->prix}}</span>
									</p>
									<meta itemprop="price" content="35"/>
									<meta itemprop="priceCurrency" content="USD"/>
									<link itemprop="availability" href="http://schema.org/InStock"/>
								</div>
								<div itemprop="description">
									<p>Date de début : {{$unVoyage->dateDebut}}</p>
									<p>Durée : {{$unVoyage->duree}} jours</p>
									<p>Emplacement : {{$unVoyage->ville}}</p>
									<p>Departement : {{$sonDepartement->codeDepartement}} : {{$sonDepartement->nomDepartement}}</p>
									<p>Région : {{$saRegion->codeRegion}} : {{$saRegion->nomRegion}} (Auparavent : {{$saRegion->ancienNom}}), {{$saRegion->typeRegion}}</p>
								</div>
								<form class="cart" method="GET" action="../../panier/ajouter/{{$unVoyage->id}}">	
									@csrf		
									<input type="number" name="voyage_id" value="{{ $unVoyage->id }}" style="display: none;">	
									@if ($errors->has('voyage_id'))
									<div class="error">
										{{ $errors->first('voyage_id') }}
									</div>
									@endif
									<label>Nombre de participants : </label>	
									<input type="number" name="quantite" value="1" style="width: 40px"><br><br>	
									@if ($errors->has('quantite'))
									<div class="error">
										{{ $errors->first('quantite') }}
									</div>
									@endif		
									<button type="submit" class="single_add_to_cart_button button alt">Ajouter au panier</button>
								</form>
								<div class="product_meta">
									<span class="posted_in">Categorie:  {{$saCategorie->categorie}}
									</span>
								</div>
							</div>
							<!-- .summary -->
							<div class="woocommerce-tabs wc-tabs-wrapper">
									<div class="panel entry-content wc-tab" id="tab-description">
									<h2>Description</h2>
									<p>
										{{$saCategorie->description}}
									</p>
								</div>
								<div class="panel entry-content wc-tab" id="tab-reviews">
									<div id="reviews">
										<div id="comments">
											<h2>2 Commentaires pour {{$unVoyage->nomVoyage}}</h2>
											<ol class="commentlist">
												<li itemprop="review" itemscope itemtype="http://schema.org/Review" class="comment">
												<div id="comment-3" class="comment_container">
													<img alt='' src='http://0.gravatar.com/avatar/c7cab278a651f438795c2a9ebf02b5ae?s=60&#038;d=mm&#038;r=g' srcset='http://0.gravatar.com/avatar/c7cab278a651f438795c2a9ebf02b5ae?s=120&amp;d=mm&amp;r=g 2x' class='avatar avatar-60 photo' height='60' width='60'/>
													<div class="comment-text">	
														<p class="meta">
															<strong itemprop="author">Guy</strong> &ndash; <time itemprop="datePublished" datetime="2013-06-07T15:54:25+00:00">Août 7, 2017</time>:
														</p>
														<div itemprop="description" class="description">
															<p>
																Wow que de merveilleux souvenirs de ce voyage... Crash d'avion, noyade, empoisonnement alimentaire.
															</p>
														</div>
													</div>
												</div>
												</li>
												<!-- #comment-## -->
												<li itemprop="review" itemscope itemtype="http://schema.org/Review" class="comment">
												<div id="comment-4" class="comment_container">
													<img alt='' src='http://2.gravatar.com/avatar/59c82b1d2c60537f900fb191b3cb611b?s=60&#038;d=mm&#038;r=g' srcset='http://2.gravatar.com/avatar/59c82b1d2c60537f900fb191b3cb611b?s=120&amp;d=mm&amp;r=g 2x' class='avatar avatar-60 photo' height='60' width='60'/>
													<div class="comment-text">													
														<p class="meta">
															<strong itemprop="author">Maria</strong> &ndash; <time itemprop="datePublished" datetime="2013-06-07T15:54:25+00:00">Juin 7, 2018</time>:
														</p>
														<div itemprop="description" class="description">
															<p>
																Ich bin brot!
															</p>
														</div>
													</div>
												</div>
												</li>
												<!-- #comment-## -->
											</ol>
										</div>
										<div id="review_form_wrapper">
											<div id="review_form">
												<div id="respond" class="comment-respond">
													<h3 style="margin-bottom:10px;" id="reply-title" class="comment-reply-title">Ajouter un commentaire <small><a rel="nofollow" id="cancel-comment-reply-link" href="/demo-moschino/product/woo-logo-2/#respond" style="display:none;">Cancel reply</a></small></h3>
													<form action="#" method="post" id="commentform" class="comment-form" novalidate>
														<p class="comment-form-rating">
															<label for="rating">Votre note</label>
															<select name="rating" id="rating">
																<option value="">Note&hellip;</option>
																<option value="5">Impécable</option>
																<option value="4">Sick</option>
																<option value="3">Pas pire pentoute</option>
																<option value="2">Pas super disons</option>
																<option value="1">Exécrable</option>
															</select>
														</p>
														<p class="comment-form-comment">
															<label for="comment">Votre commentaire</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
														</p>
														<p class="comment-form-author">
															<label for="author">Nom <span class="required">*</span></label><input id="author" name="author" type="text" value="" size="30" aria-required="true"/>
														</p>
														<p class="comment-form-email">
															<label for="email">Mail <span class="required">*</span></label><input id="email" name="email" type="text" value="" size="30" aria-required="true"/>
														</p>
														<p class="form-submit">
															<input name="submit" type="submit" id="submit" class="submit" value="Envoyer" disabled/><input type='hidden' name='comment_post_ID' value='60' id='comment_post_ID' />															
														</p>
													</form>
												</div>
												<!-- #respond -->
											</div>
										</div>
										<div class="clear">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</main>
				<!-- #main -->
			</div>
			<!-- #primary -->
		</div>
		<!-- #content -->
	</div>
	<!-- .container -->
</div>
@endsection