$(document).ready(function () {
  var category = getCheckboxValues("category");

  // Move the AJAX request to a separate function
  function loadProducts() {
    $.ajax({
      type: "POST",
      url: "../api/load_products.php",
      dataType: "json",
      data: {
        category: category,
      },
      success: function (data) {
        console.log(data);
        displayProducts(data.products);

        //$("#results").html(data.products); // Use .html() instead of .append() to replace the content
      },
    });
  }

  // Call loadProducts() on page load
  loadProducts();

  function getCheckboxValues(checkboxClass) {
    var values = new Array();
    $("." + checkboxClass + ":checked").each(function () {
      values.push($(this).val());
    });
    return values;
  }

  function displayProducts(products) {
    var productHTML = "";
    if (products.length > 0) {
      for (var i = 0; i < products.length; i++) {
        (function (product) {
          productHTML += '<div class="box">';
          productHTML += '<div class="slideshow-container">';
          productHTML +=
            '<div class="product-images" id="productImages_' +
            product.productID +
            '"></div>';
          productHTML += "</div>";
          productHTML += '<div class="content-container">';
          productHTML +=
            '<h3 style="display: inline;">' + product.productName + "</h3>";
          productHTML += "</div>";
          productHTML += '<div class="price">$' + product.price + "</div>";
          productHTML +=
            '<div style="display: flex; justify-content: center;">';
          productHTML +=
            '<a href="craft.php?productid=' + product.productID + '" class="cart">View</a>';
          productHTML += "</div>";
          productHTML += "</div>";

          // Make AJAX request to fetch the product images
          $.ajax({
            type: "POST",
            url: "../api/load_product_images.php",
            dataType: "json",
            data: {
              productID: product.productID,
            },
            success: function (data) {
              displayProductImages(data.images, product.productID);
            },
          });
        })(products[i]);
      }
    } else {
      productHTML = "<p>No products found.</p>";
    }
    $("#results").html(productHTML);
  }

  function displayProductImages(images, productID) {
    var imagesHTML = "";
    if (images.length > 0) {
      var firstImage = images[0]; // Get the first image from the array
      imagesHTML += '<div class="mySlides fade ' + productID + '">';
      imagesHTML +=
        '<img src="../images/' + firstImage + '" style="width:100%">';
      imagesHTML += "</div>";
    }
    $("#productImages_" + productID).html(imagesHTML);
  }

  $(".sort_rang").change(function (e) {
    e.preventDefault(); // Prevent the default form submission
    category = getCheckboxValues("category"); // Update the category value
    loadProducts(); // Call loadProducts() to load the updated data
  });

  $(document).on("click", "label", function () {
    if ($("input:checkbox:checked")) {
      $("input:checkbox:checked", this).closest("label").addClass("active");
    }
  });
});
