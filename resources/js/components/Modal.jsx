import React, { useEffect, useRef } from "react";
import { createPortal } from "react-dom";

const Modal = ({ children, toggle }) => {
  const ref = useRef(null);
  if (!ref.current) {
    const div = document.createElement("div");
    ref.current = div;
  }

  // hitting escape button closes modal
  useEffect(() => {
    const escapeHandler = (event) => {
      if (event.keyCode === 27) {
        toggle();
      }
    };
    window.addEventListener("keydown", escapeHandler);
    return () => {
      window.removeEventListener("keydown", escapeHandler);
    };
  }, []);

  useEffect(() => {
    const root = document.getElementById("modal");
    root.appendChild(ref.current);

    return () => {
      root.removeChild(ref.current);
    };
  }, []);

  return createPortal(
    <div className="modal-backdrop">{children}</div>,
    ref.current
  );
};

export default Modal;
