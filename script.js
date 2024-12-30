let selectInput = document.getElementById('account_type');
let currentAccount = document.getElementById('currentAccount');
let BusinessAccount = document.getElementById('businessAccount');
let SavingsAccount = document.getElementById('savingsAccount');

selectInput.addEventListener('change', () => {
    console.log(selectInput.value);

    currentAccount.style.display = 'none';
    currentAccount.querySelectorAll('input').forEach(input => input.removeAttribute('required'));

    BusinessAccount.style.display = 'none';
    BusinessAccount.querySelectorAll('input').forEach(input => input.removeAttribute('required'));

    SavingsAccount.style.display = 'none';
    SavingsAccount.querySelectorAll('input').forEach(input => input.removeAttribute('required'));

    
    if (selectInput.value == 'current') {
        currentAccount.style.display = 'block';
        currentAccount.querySelectorAll('input').forEach(input => input.setAttribute('required', 'true'));
    } else if (selectInput.value == 'savings') {
        SavingsAccount.style.display = 'block';
        SavingsAccount.querySelectorAll('input').forEach(input => input.setAttribute('required', 'true'));
    } else if (selectInput.value == 'business') {
        BusinessAccount.style.display = 'block';
        BusinessAccount.querySelectorAll('input').forEach(input => input.setAttribute('required', 'true'));
    }
});
