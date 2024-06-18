let productos = [];
        let totalPedido = 0;

        function abrirMenu(numeroMesa) {
            
            let menus = document.querySelectorAll('.menu');
            menus.forEach(menu => {
                menu.style.display = 'none';
            });
            document.getElementById(`menu${numeroMesa}`).style.display = 'block';
        }

        function agregarProducto(nombre, precio) {
            let productoExistente = productos.find(producto => producto.nombre === nombre);
            if (productoExistente) {
                productoExistente.cantidad++;
            } else {
                productos.push({ nombre, precio, cantidad: 1 });
            }
            totalPedido += precio;
            actualizarPedido();
        }

        function actualizarPedido() {
            let listaPedido = document.getElementById('lista-pedido');
            let totalElement = document.getElementById('total');

            listaPedido.innerHTML = '';
            productos.forEach(producto => {
                let li = document.createElement('li');
                li.textContent = `${producto.nombre} x${producto.cantidad} - $${producto.precio * producto.cantidad}`;
                listaPedido.appendChild(li);
            });

            totalElement.textContent = totalPedido;
            document.getElementById('pedido').style.display = 'block';
        }

        function finalizarPedido() {
            
            alert('Pedido finalizado');
        }

        function confirmarPedido() {
            alert('Pedido confirmado');
        }

        function modificarPedido() {
            
            productos = [];
            totalPedido = 0;
            actualizarPedido();
            document.getElementById('pedido').style.display = 'none';
        }