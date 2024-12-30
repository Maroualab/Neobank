let acc=[];
let tbody=document.getElementById('tbody');


async function fetchBusinessAccounts(){
await fetch("./encodeBusiness.php")
.then(res=>res.json())
.then(data=>{
    acc=data;
    // console.log(acc);
})
acc.forEach(a=>{
let tr=document.createElement('tr');
// tr.classList.add('hover:bg-gray-100')
tr.innerHTML=` <td>${a.customer_id}</td>
              <td>${a._name}</td>
              <td>${a.email}</td>
              <td>$${a.balance}</td>
              <td>$${a.credit_limit}</td>
              <td>$${a.transaction_fee}</td>
              <td>
                <button onclick="showPopUp(${a.customer_id})" id="editBtn" >Edit</button>
                <button onclick="deleteAccount(${a.customer_id})" >Delete</button>
              </td>`

      tbody.appendChild(tr);        
})
}
fetchBusinessAccounts();


async function showPopUp(id){
    let customerData;
    let popUpModel=document.getElementById('popUp');
    popUpModel.style.display = 'block';
  
   await fetch(`../CRUD/editBusinessAccount.php?id=${id}`)
    .then(res=>res.json())
    .then(data=>{
        customerData=data;
        console.log(customerData);
    })
    let customerId=document.getElementById('customerId');
    let name=document.getElementById('name');
    let email=document.getElementById('email');
    let Balance=document.getElementById('Balance');
    let creditLimit=document.getElementById('credit-limit');
    let transactionFee=document.getElementById('transaction-fee');

    customerId.value=customerData[0].customer_id;
    name.value=customerData[0]._name;
    email.value=customerData[0].email;
    Balance.value=customerData[0].balance;
    Balance.value=customerData[0].balance;
    creditLimit.value=customerData[0].credit_limit;
    transactionFee.value=customerData[0].transaction_fee;




}

function hidePopUp(event){
    let popUpModel=document.getElementById('popUp');
    popUpModel.style.display = 'none';   
}

function deleteAccount(id){
    fetch(`../CRUD/deleteAccountFromDb.php?id=${id}`)
    .then(res=>res.json())
    .then(data=>
     console.log(data),
     window.location.reload()

    )
}