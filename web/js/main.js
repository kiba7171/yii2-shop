function showCart (cart) {
  $('#cart').modal().find('.modal-body').html(cart);
}

function clearCart() {
  $.ajax({
    url: '/cart/clear',
    type: 'GET',
    success: function (res) {
      if (!res) alert ('Ошибка!');
      showCart(res);
    },
    error: function () {
      alert ('Error');
    }
  })
}

$('#cart').find('.modal-body').on('click', '.del-item', function() {
  var id = $(this).data('id');
  $.ajax({
    url: '/cart/del-item',
    data: {id: id},
    type: 'GET',
    success: function (res) {
      if (!res) alert('Ошибка!');
      //console.log(res);
      showCart(res);
    },
    error: function () {
      alert('Error');
    }
  });
});

$('#cart').on('input keyup', 'input', function() {
  var id = $(this).data('id');
  var qty = $(this).val();
  $.ajax({
    url: '/cart/upd-qty',
    data: {id: id, qty: qty},
    type: 'GET',
    success: function (res) {
      if (!res) alert('Ошибка!');
      //console.log(res);
      showCart(res);
    },
    error: function () {
      alert('Error');
    }
  });
});



$('.add-to-cart').on('click', function (e) {
  e.preventDefault();
  var id = $(this).data('id');
  $.ajax({
    url: '/cart/add',
    data: {id: id},
    type: 'GET',
    success: function (res) {
      if (!res) alert ('Ошибка!');
      //console.log(res);
      showCart(res);
    },
    error: function () {
      alert ('Error');
    }
  });

});


$('#cart-table').on('click', '.del-item', function() {
  var id = $(this).data('id');
  $.ajax({
    url: '/cart/del-item',
    data: {id: id},
    type: 'GET',
    success: function (res) {
      if (!res) alert('Ошибка!');
      //console.log(res);
      showCartPage(res);
    },
    error: function () {
      alert('Error');
    }
  });
});


function showCartPage (cart) {
  $('#cart-table').html(cart);
}




$('#cart-table').on('input keyup', 'input', function() {
  var id = $(this).data('id');
  var qty = $(this).val();
  $.ajax({
    url: '/cart/upd-qty',
    data: {id: id, qty: qty},
    type: 'GET',
    success: function (res) {
      if (!res) alert('Ошибка!');
      //console.log(res);
      showCartPage(res);
    },
    error: function () {
      alert('Error');
    }
  });
});

