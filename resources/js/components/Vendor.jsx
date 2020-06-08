import React, { useState } from "react";
import { Link } from "react-router-dom";

const Vendor = ({ inStore, cart, totalCart, store, addToCart }) => {
  const [quantity, setQuantity] = useState(1);

  const { vendor, logo } = store;
  const storeItems = Object.keys(store.products);

  // display items in store
  const displayItems = storeItems.map((item, idx) => {
    const {
      name,
      description,
      price,
      photo,
      availability,
      contains,
      remaining,
    } = store.products[item];

    // quantity dropdown
    let itemLimit = 10;
    if (remaining < 10) itemLimit = remaining;

    const displayQuantity = Array(itemLimit)
      .fill(0)
      .map((el, idx) => (
        <option key={idx} value={idx + 1}>
          {idx + 1}
        </option>
      ));

    // display ingredients properties
    const displayContains = contains.map((ingredient, idx) => (
      <p key={idx}>{ingredient}</p>
    ));

    // add payload to cart, reset quantity and dropdown to 1
    const addCart = () => {
      addToCart({
        item,
        quantity,
      });
      setQuantity(1);
      document.getElementById(`select-dd-${idx}`).selectedIndex = 0;
    };

    return (
      <div className="store-item" key={idx}>
        <div className="store-item-details">
          <div className="item-detail">
            <h3>{name}</h3>
            <p>{description}</p>
            <br />
            <h4>Contains: </h4>
            {displayContains}
          </div>
          <div className="item-availability">
            <h4>Available:</h4>
            <h4>{availability.toDateString()}</h4>
          </div>
          <div className="item-price">
            <h3>Price: ${price}</h3>
            <h4>Remaining: {remaining}</h4>
          </div>
          <div className="item-purchase">
            <div className="quantity">
              <span>Quantity: </span>
              <select
                id={`select-dd-${idx}`}
                onChange={(e) => setQuantity(Number(e.target.value))}
              >
                {displayQuantity}
              </select>
            </div>
            <div className="add-cart">
              <button onClick={() => addCart()}>Add to Cart</button>
            </div>
          </div>
        </div>
        <div className="item-image">
          <img src={photo} alt="item"></img>
        </div>
      </div>
    );
  });

  return (
    <div className="vendor-container">
      <hr />
      {/* <div className="break-container-light"></div> */}
      <div className="vendor-header">
        <h1>Welcome to {vendor}!</h1>
        <img className="vendor-img" src={logo} alt="logo" />
        {/* <h3>Menu:</h3> */}
      </div>

      {displayItems}
      <div>
        <button className="checkout-btn">
          <Link className="checkout-link" to="/checkout">Go to Checkout</Link>
        </button>
      </div>
      <div className="footer-space"></div>
    </div>
  );
};

export default Vendor;
