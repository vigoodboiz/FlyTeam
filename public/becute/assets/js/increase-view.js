
  var products = document.getElementsByClassName('product');
  
  for (var i = 0; i < products.length; i++) {
    var product = products[i];
    product.onclick = function() {
      var productId = this.getAttribute('data-product-id');
      var url = '{{ route("product.increaseViewCount") }}';
      var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
      
      fetch(url, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ productId: productId })
      })
      .then(response => response.json())
      .then(data => {
        console.log('Số lượt view của sản phẩm đã được tăng.');
      })
      .catch(error => {
        console.error('Đã xảy ra lỗi:', error);
      });
    };
  }
