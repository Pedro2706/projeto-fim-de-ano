document.addEventListener('DOMContentLoaded', () => {
    const listaCarrinho = document.getElementById('lista-carrinho');
    const totalElement = document.getElementById('total');
    const botoesAdicionar = document.querySelectorAll('.adicionar');
    let total = 0;

    botoesAdicionar.forEach(botao => {
        botao.addEventListener('click', (e) => {
            const produtoDiv = e.target.closest('.produto');
            const nomeProduto = produtoDiv.querySelector('h3').innerText;
            const preco = parseFloat(produtoDiv.querySelector('p').innerText.replace('R$', '').replace(',', '.'));

            // Adicionar ao carrinho visualmente
            const item = document.createElement('li');
            item.textContent = `${nomeProduto} - R$ ${preco.toFixed(2)}`;
            listaCarrinho.appendChild(item);

            // Atualizar total
            total += preco;
            totalElement.textContent = `Total: R$ ${total.toFixed(2)}`;
        });
    });
});

document.getElementById('finalizar-compra').addEventListener('click', () => {
    const itens = [];
    document.querySelectorAll('#lista-carrinho li').forEach(item => {
        itens.push(item.textContent);
    });
    document.getElementById('itens-carrinho').value = itens.join(';');
});
