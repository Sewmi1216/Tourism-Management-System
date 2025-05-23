Skip to content
Search or jump to…
Pull requests
Issues
Codespaces
Marketplace
Explore
 
@muralijasi 
bdcorps
/
one-time-payments-html-landing-page
Public
Fork your own copy of bdcorps/one-time-payments-html-landing-page
Code
Issues
Pull requests
Actions
Projects
Security
Insights
one-time-payments-html-landing-page/index.html
@bdcorps
bdcorps Update index.html
Latest commit 967809b on Apr 21, 2021
 History
 1 contributor
93 lines (84 sloc)  2.97 KB

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="Collect Pre-Sales revenue from early adopters using Stripe API" />
    <meta
      name="author"
      content="SaaSBase"
    />
    <title>Collect Pre-Sales revenue from early adopters using Stripe API</title>

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />

    <link href="css/main.css" rel="stylesheet" />
  </head>

  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">
            <a class="nav-link active" href="#">Biller</a>
          </h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link" href="#">Pricing</a>
            <a class="nav-link" href="#">About</a>
          </nav>
        </div>
      </header>

      <main role="main" class="inner cover">
        <div class="mb-1">
          <img
            src="images/hero-image.png"
            class="img-fluid hero-img"
            alt="Biller Illustration"
          />
        </div>

        <h1 class="cover-heading mb-2">Easiest way to get paid on time</h1>
        <p class="lead mb-5">
          Biller lets freelancers accept payments and send invoices to their clients
          with a single click.
        </p>

        <div id="payment">
          <button
            class="btn btn-outline-secondary"
            style="width: 50%;"
            type="submit"
            id="order-btn"
            data-checkout-mode="payment"
            data-price-id="price_1HhdUaAkSQQctVkLrxU3AeDS"
          >
            Pre-Order for $1 <span style="text-decoration:line-through">$20</span>
          </button>

          <div class="row">
            <div class="offset-md-2 col-md-8 offset-md-2">
              <p class="text-muted text-center">
                45 people have pre-ordered in the last week
              </p>
            </div>
          </div>
        </div>
        <p id="status" style="color: #5000ff;"></p>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner" style="color: #6c757d !important;">
          <p>Copyright © 2020 Biller | Built by <a href="https://saasbase.dev">SaaSBase</a></p>
        </div>
      </footer>
    </div>

    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
      integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
      crossorigin="anonymous"
    ></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="js/main.js"></script>
  </body>
</html>
