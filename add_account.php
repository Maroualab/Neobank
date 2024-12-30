<?php include 'layout/header.php'; ?>
<?php include 'layout/nav.php'; ?>

<h1>Ajouter un Compte Bancaire</h1>

<form action="CRUD\addAccountToDb.php" method="POST">
  

    <label for="holder_name">Nom du Titulaire:</label>
    <input type="text" id="holder_name" name="holder_name" required><br><br>

    <label for="email">Email</label>
    <input type="email" step="0.01" id="email" name="email" required><br><br>


    <label for="balance">Solde Initial:</label>
    <input type="number" step="0.01" id="balance" name="balance" required><br><br>

    <label for="account_type">Type de Compte:</label>
    <select id="account_type" name="account_type" required>
        <option value="" selected>Sélectionner un Compte</option>
        <option value="savings">Compte Épargne</option>
        <option value="current">Compte Courant</option>
        <option value="business">Compte Entreprise</option>
    </select><br><br>


    <div id="savingsAccount" class="hidden">
        <label for="interestRate">Taux d'intérêt</label>
        <input type="number" name="interestRate" required>

        <label for="minimumBalance">solde minimum</label>
        <input type="number" name="minimumBalance" required>
    </div>

    <div id="businessAccount" class="hidden">
        <label for="creditLimit">Limite de crédit</label>
        <input type="number" name="creditLimit" required>

        <label for="transactionFee">Frais de transaction</label>
        <input type="number" name="transactionFee" required>
    </div>

    <div id="currentAccount" class="hidden">
        <label for="overdraftLimit">limite de découvert</label>
        <input type="number" name="overdraftLimit" required>

        <label for="monthlyFee">Frais Mensuel</label>
        <input type="number" name="monthlyFee" required>
    </div>

    <input type="submit" name="submit" value="Ajouter">
</form>

<script src='script.js'></script>

<?php include 'layout/footer.php'; ?>