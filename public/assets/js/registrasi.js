document.getElementById('newButton').addEventListener('click', function() {
    document.getElementById('newCard').style.display = 'block';
});

document.getElementById('closeForm').addEventListener('click', function() {
    document.getElementById('newCard').style.display = 'none';
});

// document.getElementById('unitForm').addEventListener('submit', function(e) {
//     e.preventDefault();
//     var formData = new FormData(this);
//     var newRow = document.createElement('tr');
//     newRow.innerHTML = `
//         <td class="align-items-center">
//             <div class="d-flex align-items-center">
//                 <button type="button" class="btn btn-sm btn-light btn-approve"
//                     data-bs-toggle="modal" data-bs-target="#approveModal">
//                     <i class="fas fa-pen-to-square"></i>
//                 </button>
//                 <button type="button"
//                     class="btn btn-sm btn-outline-danger btn-reject"
//                     data-bs-toggle="modal" data-bs-target="#rejectModal">
//                     <i class="fas fa-trash"></i>
//                 </button>
//             </div>
//         </td>
//         <td>${formData.get('unit_brand')}</td>
//         <td>${formData.get('unit_type')}</td>
//         <td>${formData.get('unit_condition')}</td>
//         <td>${formData.get('unit_VIN')}</td>
//         <td>${formData.get('unit_LICENSE')}</td>
//         <td>${formData.get('unit_LICENSE_type')}</td>
//         <td>${formData.get('unit_color')}</td>
//         <td>${formData.get('unit_RegYear')}</td>
//     `;
//     document.getElementById('unitTableBody').appendChild(newRow);
//     this.reset();
//     document.getElementById('newCard').style.display = 'none';
// });

// const closeFormButton = document.getElementById('closeForm');
//     const newCard = document.getElementById('newCard');

//     closeFormButton.addEventListener('click', function() {
//         newCard.style.display = 'none';
//     });
