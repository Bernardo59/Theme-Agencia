<?php get_header() ?>

<div class="container page-sidebar">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post() ?>
            <main>
                <header class="news-single__header">
                    <div class="news-single__title"><?php the_title() ?></div>
                    <div class="news-single__meta">
                        <?php agencia_listing_categories() ?>
                        <div class="news__date">Publié le <?= the_date() ?> à <?= the_time() ?></div>
                    </div>
                </header>
                <div class="formatted">
                    <?php if(has_post_thumbnail()): ?>
                        <p style="text-align: center"><?php the_post_thumbnail('full') ?></p>
                    <?php endif; ?>
                    <?php the_content() ?>
                </div>

                <div class="comments">
                    <div class="comments__title">10 commentaires</div>

                    <div class="comments__list">

                        <div class="comment">
                            <img alt="" src="https://secure.gravatar.com/avatar/d7a973c7dab26985da5f961be7b74480?s=120&amp;r=g" class="comment__avatar" height="120" width="120">
                            <div class="comment__body">
                                <footer>
                                    <div class="comment__username">A WordPress Commenter</div>
                                    <div class="comment__date">October 23, 2019 at 11:51 am</div>
                                </footer>
                                <div class="comment__content">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur delectus necessitatibus officiis.
                                        Accusantium autem dolorem est id inventore laudantium molestias, nulla pariatur perspiciatis provident, quia
                                        reiciendis rem sapiente tempore, veniam.
                                    </p>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias atque culpa deleniti dicta dolores esse,
                                        incidunt magnam molestiae nam natus non pariatur placeat quas quasi quisquam quo sapiente suscipit
                                        voluptatum!
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="comment">
                            <img alt="" src="https://secure.gravatar.com/avatar/d7a973c7dab26985da5f961be7b74480?s=120&amp;r=g" class="comment__avatar" height="120" width="120">
                            <div class="comment__body">
                                <footer>
                                    <div class="comment__username">A WordPress Commenter</div>
                                    <div class="comment__date">October 23, 2019 at 11:51 am</div>
                                </footer>
                                <div class="comment__content">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur delectus necessitatibus officiis.
                                        Accusantium autem dolorem est id inventore laudantium molestias, nulla pariatur perspiciatis provident, quia
                                        reiciendis rem sapiente tempore, veniam.
                                    </p>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias atque culpa deleniti dicta dolores esse,
                                        incidunt magnam molestiae nam natus non pariatur placeat quas quasi quisquam quo sapiente suscipit
                                        voluptatum!
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="comment">
                            <img alt="" src="https://secure.gravatar.com/avatar/d7a973c7dab26985da5f961be7b74480?s=120&amp;r=g" class="comment__avatar" height="120" width="120">
                            <div class="comment__body">
                                <footer>
                                    <div class="comment__username">A WordPress Commenter</div>
                                    <div class="comment__date">October 23, 2019 at 11:51 am</div>
                                </footer>
                                <div class="comment__content">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur delectus necessitatibus officiis.
                                        Accusantium autem dolorem est id inventore laudantium molestias, nulla pariatur perspiciatis provident, quia
                                        reiciendis rem sapiente tempore, veniam.
                                    </p>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias atque culpa deleniti dicta dolores esse,
                                        incidunt magnam molestiae nam natus non pariatur placeat quas quasi quisquam quo sapiente suscipit
                                        voluptatum!
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="comment">
                            <img alt="" src="https://secure.gravatar.com/avatar/d7a973c7dab26985da5f961be7b74480?s=120&amp;r=g" class="comment__avatar" height="120" width="120">
                            <div class="comment__body">
                                <footer>
                                    <div class="comment__username">A WordPress Commenter</div>
                                    <div class="comment__date">October 23, 2019 at 11:51 am</div>
                                </footer>
                                <div class="comment__content">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur delectus necessitatibus officiis.
                                        Accusantium autem dolorem est id inventore laudantium molestias, nulla pariatur perspiciatis provident, quia
                                        reiciendis rem sapiente tempore, veniam.
                                    </p>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias atque culpa deleniti dicta dolores esse,
                                        incidunt magnam molestiae nam natus non pariatur placeat quas quasi quisquam quo sapiente suscipit
                                        voluptatum!
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="comment">
                            <img alt="" src="https://secure.gravatar.com/avatar/d7a973c7dab26985da5f961be7b74480?s=120&amp;r=g" class="comment__avatar" height="120" width="120">
                            <div class="comment__body">
                                <footer>
                                    <div class="comment__username">A WordPress Commenter</div>
                                    <div class="comment__date">October 23, 2019 at 11:51 am</div>
                                </footer>
                                <div class="comment__content">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur delectus necessitatibus officiis.
                                        Accusantium autem dolorem est id inventore laudantium molestias, nulla pariatur perspiciatis provident, quia
                                        reiciendis rem sapiente tempore, veniam.
                                    </p>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias atque culpa deleniti dicta dolores esse,
                                        incidunt magnam molestiae nam natus non pariatur placeat quas quasi quisquam quo sapiente suscipit
                                        voluptatum!
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="comments__title">Laissez un commentaire</div>
                    <form action="" class="form-2column">
                        <div class="form-group">
                            <input type="text" id="username" class="form-control">
                            <label for="username">Pseudo</label>
                        </div>
                        <div class="form-group">
                            <input type="text" id="email" class="form-control">
                            <label for="email">Email</label>
                        </div>
                        <textarea placeholder="Message" class="form-control full"></textarea>
                        <button type="submit" class="btn">Commenter</button>
                    </form>

                </div>


            </main>
        <?php endwhile; ?>
    <?php else : ?>
        <h1>L'article semble avoir disparu...</h1>
    <?php endif; ?>
    <aside class="sidebar">
        <div class="sidebar__widget">
            <div class="sidebar__title">Recherche</div>
            <form action="#" class="form-group form-search">
                <input type="search" placeholder="Rechercher une actualité">
                <button type="submit">
                    <svg class="icon">
                        <use xlink:href="sprite.14d9fd56.svg#search"></use>
                    </svg>
                </button>
            </form>
        </div>

        <div class="sidebar__widget">
            <h4 class="sidebar__title">Dernières actualités</h4>
            <ul class="sidebar__list">

                <li><a href="single.html">Maison 4 pièce(s) - 10m²</a></li>

                <li><a href="single.html">Maison 4 pièce(s) - 20m²</a></li>

                <li><a href="single.html">Maison 4 pièce(s) - 30m²</a></li>

                <li><a href="single.html">Maison 4 pièce(s) - 40m²</a></li>

            </ul>
        </div>

        <div class="sidebar__widget">
            <h4 class="sidebar__title">Dernières actualités</h4>
            <ul class="sidebar__list">

                <li><a href="single.html">Maison 4 pièce(s) - 10m²</a></li>

                <li><a href="single.html">Maison 4 pièce(s) - 20m²</a></li>

                <li><a href="single.html">Maison 4 pièce(s) - 30m²</a></li>

                <li><a href="single.html">Maison 4 pièce(s) - 40m²</a></li>

            </ul>
        </div>

    </aside>

</div>



<?php get_footer() ?>