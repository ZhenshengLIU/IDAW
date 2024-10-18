document.addEventListener("DOMContentLoaded",function(){

    // submit the form
    document.querySelector('.form').addEventListener('submit',function(event){

        //Cancel the default action of event
        event.preventDefault();

        // get the value in the form
        let name = document.getElementById('name').value.trim();
        let surname = document.getElementById('surname').value.trim();
        let dob = document.getElementById('dob').value.trim();
        let course = document.getElementById('course').checked ? 'oui' : 'non';
        let remarks = document.getElementById('remarks').value.trim();

        // if name is entered, create HTML code for a new row with input info
        if(name !== ""){
        let newrow =   `<tr>
                            <td>${name}</td>
                            <td>${surname}</td>
                            <td>${dob}</td>
                            <td>${course}</td>
                            <td>${remarks}</td>
                            <td>
                                <button onclick="editRow(this)">Edit</button>
                                <button onclick="deleteRow(this)">Delete</button>
                            </td>
                        </tr>` ;
        
        
        //insert the HTML code
        document.getElementById('studentsTableBody').insertAdjacentHTML('beforeend', newrow);

        //reset the form
        document.querySelector('.form').reset();

        }else{
            alert("You should enter the name");
        }
 
    })
});

// function editRow(button) {
//     let row_to_be_edited = button.closest('tr');
//     let cells = row_to_be_edited.cells;
//     let name = cells[0].textContent;
//     let surname = cells[1].textContent;
//     let dob = cells[2].textContent;
//     let course = cells[3].textContent === 'oui';
//     let remarks = cells[4].textContent;

//     document.getElementById('name').value = name;
//     document.getElementById('surname').value = surname;
//     document.getElementById('dob').value = dob;
//     document.getElementById('course').checked = course;
//     document.getElementById('remarks').value = remarks;

//     row_to_be_edited.parentNode.removeChild(row_to_be_edited);
// }




function deleteRow(button){
    let row_to_be_deleted = button.closest('tr');
    row_to_be_deleted.parentNode.removeChild(row_to_be_deleted);

}


function editRow(button) {
    let row_to_be_edited = button.closest('tr');
    let cells = row_to_be_edited.cells;

    for (let i= 0; i<cells.length-1;i++){
        // skip the 3rd column bacause it's a checkbox.
        if (i==3) continue;

        //replace
        let originaldata = cells[i].textContent;
        cells[i].innerHTML= `<input type="text" value="${originaldata}">`;
    }

    cells[3].innerHTML =`<input type="checkbox" ${cells[3].textContent === 'oui'? 'checked' : ''}>`
    cells[cells.length-1].innerHTML=`<button onclick="confirmEdit(this)">Confirm</button>
                                     <button onclick="deleteRow(this)">Delete</button>`


}

// function confirmEdit(button){

//     alert("go");

//     let row_to_be_confirmed = button.closet('tr')
//     let cells = row_to_be_confirmed.cells;

//     for (let i= 0; i<cells.length-1;i++){
//         if (i==3) continue; 

//         let input = cells[i].querySelector('input');
//         cells[i].innerHTML = `<td>${input.value}<td>`;

//     }

//     cells[3].innerHTML = `<td> ${checkbox.checked ? 'oui':'non'}</td>`;
//     cells[cells.length - 1].innerHTML = `<button onclick="editRow(this)">Edit</button>
//                                         <button onclick="deleteRow(this)">Delete</button>`;
// }


function confirmEdit(button) {
    let row = button.closest('tr'); 
    let cells = row.cells; 

    for (let i = 0; i < cells.length - 1; i++) { 
        if (i === 3) continue; 
        let input = cells[i].querySelector('input');
        cells[i].textContent = input.value; 
    }

    let checkbox = cells[3].querySelector('input[type="checkbox"]');
    cells[3].textContent = checkbox.checked ? 'oui' : 'non'; 

    cells[cells.length - 1].innerHTML = `<button onclick="editRow(this)">Edit</button>
                                          <button onclick="deleteRow(this)">Delete</button>`;
}
