<?php include '../layout/header.php'; ?>
<?php include '../layout/nav.php'; ?>

<div>
  <section id="accountsList">
    <h2>Liste des Comptes Bancaires</h2>
    <div>
      <h2>Customer Account Information</h2>
      <table>
        <thead>
          <tr>
            <th>Customer ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Balance</th>
            <th>Credit Limit</th>
            <th>Transaction Fee</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="tbody">
        
        </tbody>
      </table>
    </div>
  </section>
</div>

<div id="popUp" class="hidden">
  <div role="alert">
    <div>
      <button onclick="hidePopUp()" aria-label="close modal" role="button">X</button> 

      <h1>Edit Account</h1>
      <!-- Form Fields -->
     <form action="../CRUD/editBusinessAccount.php" method="POST">
        <input type="hidden" id="customerId" name="id">
        <label for="name">Owner Name</label>
        <input id="name" name="name" placeholder="Name" required />
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Email" required />
        <label for="Balance">Balance</label>
        <input type="number" name="balance" id="Balance" placeholder="Balance" required />
        <label for="credit-limit">Credit Limit</label>
        <input id="credit-limit" name="credit-limit" placeholder="Enter Credit Limit" required />
        <label for="transaction-fee">Transaction Fee</label>
        <input id="transaction-fee" name="transaction-fee" placeholder="Enter Transaction Fee" required />
        <div>
          <button type="submit" name="save">Submit</button>
          <button type="button" onclick="hidePopUp()">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script src="./displayBusinessAccount.js"></script>
<?php include '../layout/footer.php' ?>