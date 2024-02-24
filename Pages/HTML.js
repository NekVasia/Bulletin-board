(function (app) {
    app.Create = {

        divBlock: function createDivBlock(blockClass, pText, inputClass, inputId) {
            let block = document.createElement('div');
            block.className = blockClass;

            let p = document.createElement('p');
            p.className = 'p__input';
            p.textContent = pText;

            let input = document.createElement('input');
            input.className = inputClass;
            input.id = inputId;

            block.append(p);
            block.append(input);

            return block;
        },

        divInput: function createInputCell(inputId, inputPlaceholder, pText) {
            let cell = document.createElement('div');
            cell.className = 'section__container__cell';

            let input = document.createElement('input');
            input.className = 'section__input';
            input.id = inputId;
            input.placeholder = inputPlaceholder;

            let p = document.createElement('p');
            p.className = 'p__input';
            p.textContent = pText;

            cell.append(input);
            cell.append(p);

            return cell;
        },

        buttonElement: function createButtonElement(buttonClass, buttonText, buttonOnclick) {
            let button = document.createElement('button');

            button.className = buttonClass;
            button.textContent = buttonText;
            button.onclick = buttonOnclick;

            return button;
        }
    }
})(AdsBoard);