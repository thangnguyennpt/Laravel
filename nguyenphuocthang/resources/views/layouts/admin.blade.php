import React from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

const AdminLayout = ({ children, title }) => {
  return (
    <div className="wrapper">
      <nav className="main-header navbar navbar-expand navbar-white navbar-light">
        <ul className="navbar-nav">
          <li className="nav-item">
            <a className="nav-link" data-widget="pushmenu" href="#" role="button">
              <i className="fas fa-bars"></i>
            </a>
          </li>
          <li className="nav-item d-none d-sm-inline-block">
            <a href="/admin/dashboard" className="nav-link">Home</a>
          </li>
          <li className="nav-item d-none d-sm-inline-block">
            <a href="#" className="nav-link">Contact</a>
          </li>
        </ul>
        <ul className="navbar-nav ml-auto">
          <li className="nav-item">
            <a className="nav-link" href="#">
              <i className="far fa-user"></i> Quản lý
            </a>
          </li>
          <li className="nav-item">
            <a className="nav-link" href="#">
              <i className="fas fa-power-off"></i> Thoát
            </a>
          </li>
        </ul>
      </nav>

      <aside className="main-sidebar sidebar-dark-primary elevation-4">
        <a href="index3.html" className="brand-link">
          <img src="/images/logo.jpg" alt="Admin Logo" className="brand-image img-circle elevation-3" style={{ opacity: .8 }} />
          <span className="brand-text font-weight-light">Admin</span>
        </a>

        <div className="sidebar">
          <div className="user-panel mt-3 pb-3 mb-3 d-flex">
            <div className="image">
              <img src="/images/logo.jpg" className="img-circle elevation-2" alt="User" />
            </div>
            <div className="info">
              <a href="#" className="d-block">fashion</a>
            </div>
          </div>

          <nav className="mt-2">
            <ul className="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li className="nav-item">
                <a href="#" className="nav-link">
                  <i className="nav-icon fas fa-tachometer-alt"></i>
                  <p>Sản phẩm <i className="right fas fa-angle-left"></i></p>
                </a>
                <ul className="nav nav-treeview">
                  <li className="nav-item">
                    <a href="/admin/product" className="nav-link">
                      <i className="far fa-circle nav-icon"></i>
                      <p>Tất cả sản phẩm</p>
                    </a>
                  </li>
                  <li className="nav-item">
                    <a href="/admin/category" className="nav-link">
                      <i className="far fa-circle nav-icon"></i>
                      <p>Danh mục</p>
                    </a>
                  </li>
                  <li className="nav-item">
                    <a href="/admin/brand" className="nav-link">
                      <i className="far fa-circle nav-icon"></i>
                      <p>Thương hiệu</p>
                    </a>
                  </li>
                </ul>
              </li>
              {/* Add more sidebar items as needed */}
            </ul>
          </nav>
        </div>
      </aside>

      <div className="content-wrapper">
        <section className="content-header">
          <div className="container-fluid">
            <div className="row mb-2">
              <div className="col-sm-6">
                <h1>{title}</h1>
              </div>
              <div className="col-sm-6">
                <ol className="breadcrumb float-sm-right">
                  <li className="breadcrumb-item"><a href="#">Home</a></li>
                  <li className="breadcrumb-item active">{title}</li>
                </ol>
              </div>
            </div>
          </div>
        </section>

        <section className="content">
          <div className="card">
            <div className="card-header">
              <div className="row">
                <div className="col-12 text-right">
                  NUT
                </div>
              </div>
            </div>
            <div className="card-body">
              {children}
            </div>
          </div>
        </section>
      </div>

      <footer className="main-footer">
        <div className="float-right d-none d-sm-block">
          <b>Version</b> 3.2.0
        </div>
        <strong>Sửa bởi: thang</strong> All rights reserved.
      </footer>

      <aside className="control-sidebar control-sidebar-dark"></aside>
    </div>
  );
};

export default AdminLayout;
