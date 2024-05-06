<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Professional Page with Dropdown</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .container {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      padding: 20px;
    }
    .left {
      flex: 1;
      padding-right: 20px;
    }
    .right {
      flex: 1;
      padding-left: 20px;
      border-left: 1px solid #ccc;
    }
    .dropdown-menu {
      width: 100%;
    }
    .dropdown-item {
      cursor: pointer;
    }
    .content {
      display: none;
    }
    .active {
      display: block;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="left">
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
        Select Item
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li class="dropdown-item" data-target="item1">Item 1</li>
        <li class="dropdown-item" data-target="item2">Item 2</li>
        <li class="dropdown-item" data-target="item3">Item 3</li>
      </ul>
    </div>
  </div>
  <div class="right">
    <div class="content" id="item1">
      <h2>Item 1 Content</h2>
      <p>This is the content for Item 1.</p>
    </div>
    <div class="content" id="item2">
      <h2>Item 2 Content</h2>
      <p>This is the content for Item 2.</p>
    </div>
    <div class="content" id="item3">
      <h2>Item 3 Content</h2>
      <p>This is the content for Item 3.</p>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script>
  $(document).ready(function() {
    $('.dropdown-item').click(function() {
      var target = $(this).data('target');
      $('.content').removeClass('active');
      $('#' + target).addClass('active');
    });
  });
</script>

</body>
</html>
