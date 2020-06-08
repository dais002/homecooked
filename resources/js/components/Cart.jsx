import React, { useState, useEffect } from "react";
import Modal from "./Modal";
import axios from "axios";

// type CartProducts = {
//   store: String;
//   item: String;
// }

const Cart = ({ cart, totalCart, stores, itemCount, removeItem }) => {
  const [displayProducts, setDisplayProducts] = useState([]);
  const [displayModal, setDisplayModal] = useState(false);
  const [order, setOrder] = useState({
    customer: "",
    email: "",
    payment: "",
    travel: false,
    time: "",
    message: "",
    details: [],
  });

  useEffect(() => {
    console.log("useeffect");
    const cartProducts = [];
    const orderDetails = [];
    Object.keys(stores).forEach((store) => {
      const { products, vendor } = stores[store];
      Object.keys(products).forEach((item) => {
        const { name, price, cartCount, remaining } = products[item];
        if (cartCount > 0) {
          cartProducts.push({ store, item });
          orderDetails.push({
            vendor,
            name,
            price,
            cartCount,
            remaining,
          });
        }
      });
    });
    setDisplayProducts(cartProducts);
    setOrder({
      ...order,
      details: [...orderDetails],
    });
  }, [stores]);

  const displayCartProducts = displayProducts.map((product, idx) => {
    const { store, item } = product;
    const { vendor, products } = stores[store];
    const { name, price, cartCount, photo, remaining } = products[item];

    const itemsAdjustment = (toggle, item) => {
      if (toggle) {
        if (remaining === 0) return;
        itemCount(toggle, item);
      } else {
        if (cartCount === 1) return;
        itemCount(toggle, item);
      }
    };

    return (
      <div className="product-container" key={idx}>
        <div className="product-name">
          <div className="product-text">
            <h3>{name}</h3>
            <h4>{vendor}</h4>
            <button onClick={() => setDisplayModal(!displayModal)}>
              Remove Item
            </button>
          </div>
          <img src={photo} alt="logo" />
          {displayModal ? (
            <Modal toggle={() => setDisplayModal(!displayModal)}>
              <div className="modal-box-delete">
                <h2>Are you sure you want to remove</h2>
                <h2 className="remove-item">
                  {vendor}'s {name}
                </h2>
                <h2>from your cart ?</h2>
                <div className="delete-item-btns">
                  <button
                    onClick={() => {
                      removeItem(product);
                      setDisplayModal(!displayModal);
                    }}
                  >
                    Yes
                  </button>
                  <button onClick={() => setDisplayModal(!displayModal)}>
                    Cancel
                  </button>
                </div>
              </div>
            </Modal>
          ) : null}
        </div>
        <div className="product-price">
          <h3>${price}.00</h3>
        </div>
        <div className="product-quantity">
          <div className="product-adjust">
            <ion-icon
              name="chevron-down-circle-outline"
              onClick={() => itemsAdjustment(false, product)}
            ></ion-icon>
            <span>
              <h3> {cartCount} </h3>
            </span>
            <ion-icon
              name="chevron-up-circle-outline"
              onClick={() => itemsAdjustment(true, product)}
            ></ion-icon>
          </div>
          <p>Available: {remaining}</p>
        </div>
        <div className="product-total">
          <h3>${cartCount * price}.00</h3>
        </div>
      </div>
    );
  });

  const updateOrder = (e) => {
    const { name, value } = e.target;
    setOrder({
      ...order,
      [name]: value.trim(),
    });
  };

  const submitOrder = (e) => {
    e.preventDefault();
    axios.post("/email", order);
    console.log("submitted order", order);
    console.log("displayproducts", displayProducts);
  };

  if (cart) {
    return (
      <div>
        <div className="break-container-light">
          <h2>C h e c k o u t</h2>
        </div>
        <div className="cart-container">
          <div className="cart-display">
            <div className="cart-item-list">
              <div className="cart-headers">
                <h3 className="cart-item-name">ITEM</h3>
                <h3 className="cart-item-price">PRICE</h3>
                <h3 className="cart-item-quantity">QUANTITY</h3>
                <h3 className="cart-item-total">TOTAL</h3>
              </div>
              {displayCartProducts}
            </div>
            <div className="cart-totals-container">
              <div className="cart-totals">
                <div className="order-summary">
                  <h2>Order Summary:</h2>
                </div>
                <div className="order-calculations">
                  <div className="cart-labels">
                    <h3>Subtotal:</h3>
                    <h4>Tax (CA):</h4>
                    <h4 className="cart-labels-fee">Service Fee:</h4>
                    <h3 className="cart-labels-total">Total Due:</h3>
                  </div>
                  <div className="cart-subtotal">
                    <h3>${totalCart}.00</h3>
                    <h4>${(totalCart * 0.1025).toFixed(2)}</h4>
                    <h4 className="cart-fee">$1.00</h4>
                    <h3 className="cart-total-price">
                      ${(totalCart + totalCart * 0.1025 + 1).toFixed(2)}
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div className="customer-container">
            <form className="customer-form" onSubmit={submitOrder}>
              <label htmlFor="cust-name">Name:</label>
              <input
                id="cust-name"
                type="text"
                name="customer"
                onChange={updateOrder}
              />

              <label htmlFor="cust-email">Email:</label>
              <input
                id="cust-email"
                type="email"
                name="email"
                onChange={updateOrder}
              />

              <label htmlFor="cust-payment">Payment Method:</label>
              <select
                defaultValue="select"
                id="cust-payment"
                name="payment"
                onChange={updateOrder}
              >
                <option value="select" disabled required>
                  Select
                </option>
                <option value="zelle">Zelle</option>
                <option value="venmo">Venmo</option>
                <option value="cashapp">CashApp</option>
                <option value="cash">Cash</option>
              </select>

              <label htmlFor="cust-travel">Delivery or Pickup?</label>
              <select
                defaultValue="select"
                id="cust-travel"
                name="travel"
                onChange={updateOrder}
              >
                <option value="select" disabled required>
                  Select
                </option>
                <option value="delivery">Delivery</option>
                <option value="pickup">Pickup</option>
              </select>

              <label htmlFor="cust-time">Time Desired:</label>
              <select
                id="cust-time"
                defaultValue="select"
                name="time"
                onChange={updateOrder}
              >
                <option value="select" disabled required>
                  Select
                </option>
                <option value="morning">9 A.M.</option>
                <option value="lunch">12 P.M.</option>
                <option value="afternoon">3 P.M.</option>
                <option value="dinner">6 P.M.</option>
              </select>

              <textarea
                className="comments-box"
                placeholder="Include a message to the chefs..."
                name="message"
                onChange={updateOrder}
              />

              <input
                className="complete-order"
                type="submit"
                value="Place Your Order"
              />
            </form>
          </div>
        </div>
      </div>
    );
  } else {
    return (
      <div className="empty-cart">
        <div className="break-container-light">
          <h2>There are no items in the cart.</h2>
        </div>
      </div>
    );
  }
};

export default Cart;
