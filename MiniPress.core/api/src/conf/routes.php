    <?php


    use minipress\api\actions\getAccueilApi;
    use minipress\api\actions\getArticleApi;
    use minipress\api\actions\getArticleByIdApi;
    use minipress\api\actions\getArticlesByCategorieApi;
    use minipress\api\actions\getArticleByAuteurApi;
    use minipress\api\actions\getCategoriesApi;

    return function (\Slim\App $app): void {
        $app->get('/', getAccueilApi::class)->setName('home');
        $app->get('/api/categories[/]', getCategoriesApi::class)->setName('getCategoriesApi');
        $app->get('/api/articles[/]', getArticleApi::class)->setName('getArticleApi');
        $app->get('/api/categories/{id}/articles[/]', getArticlesByCategorieApi::class)->setName('getArticlesByCategorieApi');
        $app->get('/api/articles/{id}[/]', getArticleByIdApi::class)->setName('getArticleByIdApi');
        $app->get('/api/auteurs/{id}/articles[/]', getArticleByAuteurApi::class)->setName('getArticleByAuteurApi');
    };
