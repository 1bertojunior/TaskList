// function criarElemento(tag, props, ...children) {
//     const elemento = document.createElement(tag);

//     for (let key in props) {
//         elemento[key] = props[key];
//     }

//     children.forEach(child => {
//         if (typeof child === 'string') {
//             elemento.appendChild(document.createTextNode(child));
//         } else {
//             elemento.appendChild(child);
//         }
//     });

//     return elemento;
// }

// function editar(id, txt_tarefa) {
//     // Criar um form de edição
//     const form = criarElemento('form', {
//         action: 'index.php?pag=index&acao=atualizar',
//         method: 'post',
//         className: 'row'
//     });

//     // Criar um input para entrada do texto
//     const inputTarefa = criarElemento('input', {
//         type: 'text',
//         name: 'tarefa',
//         className: 'col-9 form-control',
//         value: txt_tarefa
//     });

//     // Criar um input hidden para guardar o id da tarefa
//     const inputId = criarElemento('input', {
//         type: 'hidden',
//         name: 'id',
//         value: id
//     });

//     // Criar um botão para envio do form
//     const button = criarElemento('button', {
//         type: 'submit',
//         className: 'col-3 btn btn-info'
//     }, 'Atualizar');

//     // Incluir inputTarefa, inputId e button no form
//     form.appendChild(inputTarefa);
//     form.appendChild(inputId);
//     form.appendChild(button);

//     // Selecionar a div tarefa
//     const tarefa = document.getElementById('tarefa_' + id);

//     // Limpar o conteúdo da tarefa para inclusão do form
//     tarefa.innerHTML = '';

//     // Incluir form na página
//     tarefa.appendChild(form);
// }

// function remover(id) {
//     window.location.href = 'index.php?pag=index&acao=remover&id=' + id;
// }

// function marcarRealizada(id) {
//     window.location.href = 'index.php?pag=index&acao=marcarRealizada&id=' + id;
// }

function createElement(tag, props, ...children) {
    const element = document.createElement(tag);

    for (let key in props) {
        element[key] = props[key];
    }

    children.forEach(child => {
        if (typeof child === 'string') {
            element.appendChild(document.createTextNode(child));
        } else {
            element.appendChild(child);
        }
    });

    return element;
}

function editTask(id, taskText) {
    // Create an edit form
    const form = createElement('form', {
        action: 'index.php?pag=index&action=update',
        method: 'post',
        className: 'row'
    });

    // Create an input for text entry
    const inputTask = createElement('input', {
        type: 'text',
        name: 'tarefa',
        className: 'col-9 form-control',
        value: taskText
    });

    // Create a hidden input to store the task id
    const inputId = createElement('input', {
        type: 'hidden',
        name: 'id',
        value: id
    });

    // Create a button for form submission
    const button = createElement('button', {
        type: 'submit',
        className: 'col-3 btn btn-info'
    }, 'Update');

    // Include inputTask, inputId, and button in the form
    form.appendChild(inputTask);
    form.appendChild(inputId);
    form.appendChild(button);

    // Select the task div
    const task = document.getElementById('tarefa_' + id);

    // Clear the content of the task for form inclusion
    task.innerHTML = '';

    // Include the form on the page
    task.appendChild(form);
}

function removeTask(id) {
    window.location.href = 'index.php?pag=index&action=remove&id=' + id;
}

function markAsCompleted(id) {
    window.location.href = 'index.php?pag=index&action=markAsCompleted&id=' + id;
}

