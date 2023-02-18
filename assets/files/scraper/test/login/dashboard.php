<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard</title>
  </head>
  <body>
    <h1>Dashboard</h1>
    <p>Welcome to your dashboard, <?php echo $_SESSION['username']; ?>!</p>
    <p>Here's some example data:</p>
    <ul>
      <li>Total orders: 100</li>
      <li>Total revenue: $10,000</li>
      <li>Current user: <?php echo $_SESSION['username']; ?></li>
    </ul>
  </body>
</html>
