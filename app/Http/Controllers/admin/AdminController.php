<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\Permission;
use App\Models\Slide;
use App\Models\TypeProduct;
use App\Models\User;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\BillDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\TypeProductRequest;
use App\Http\Requests\BillRequest;
use Image;

class AdminController extends Controller
{
    public function homeAdmin() {
        return view("admin.home");
    }

    public function login(Request $request)
    {
        $user_data = array(
            'email' => $request->email,
            'password' => $request->password
        );
        $remember = $request->remember;
        if (Auth::attempt($user_data, $remember)) {
            if(Auth::user()->role_id === 1){

                return redirect('admin/');
            }else{
                return back()->with('error', 'Không thể truy cập trang này');
            }


        } else {
            return back()->with('error', 'Tài khoản hoặc mật khẩu chưa chính xác');
        }
//        return back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
    public function loginView() {
        return view("admin.login.login");
    }

    public function getUsers() {
        $users = User::all();
        $roles = Role::all();
        return view("admin.users.view_users")->with(compact("users", "roles"));
    }

    public function editUsers($id) {
        $userDetails = User::where(['id'=>$id])->first();
        $roles = Role::all();
        $rolePermissions  = RolePermission::all();
        $permissions = Permission::all();
        return view("admin.users.edit_users")->with(compact("userDetails", "roles", "rolePermissions", "permissions"));;
    }

    public function addUsers() {
        $roles = Role::all();
        $rolePermissions  = RolePermission::all();
        $permissions = Permission::all();
        return view("admin.users.add_users")->with(compact("roles", "rolePermissions", "permissions"));
    }

    public function insertUser(UserRequest $request){
        $data = $request->all();
        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->role_id = $data['role_id'];
        $user->password = hash::make($data['password']);
        if( $user->save()){
            return back()->with('success', 'User has been added successfully');
        }
        else{
            return back()->with('error', 'Couldnt add a new user');
        }
    }

    public function updateRole(Request $request, $id) {
        if(Auth::user()->id == $id) {
            return back()->with('err', 'Không thể thực hiện thao tác');
        }
        $data = $request->all();
        User::where('id',$id)->update(['role_id'=>$data['role_id']]);
    }

    public function getUserByRole ($role_id) {
        $users = User::where(['role_id'=>$role_id])->get();
        $roles = Role::all();
        return view("admin.users.view_users")->with(compact("users", "roles"));
    }

    public function deleteUser($id){
        if(Auth::user()->id == $id) {
            return back()->with('err', 'Không thể thực hiện thao tác');
        }
        if(User::where(['id'=>$id])->delete()){
            return back()->with('info', 'Yêu cầu đã được thực hiện');
        }
        else return back()->with('error', 'Đã có lỗi xảy ra, vui lòng thực hiện lại');
    }

    public function updateUser(EditUserRequest $request, $id) {
//        dd($request);

        $data = $request->all();
        $check = User::where('email', $data["email"])->first();
        $user = User::find($id);
        if($user->email != $data["email"] && $check != null) {
            return back()->with('error', 'Email đã tồn tại, xin vui lòng thử lại');
        } else {
            if ($data['password'] == "" || $data['password'] == null) {
                $user->name = $data["name"];
                $user->email = $data["email"];
                $user->role_id = $data["role_id"];
                if ($user->save()) {
                    return back()->with('success', 'Thông tin đã được lưu lại');
                } else {
                    return back()->with('error', 'Đã có lỗi xảy ra, xin vui lòng thử lại');
                }
            } else {
                $users = User::find($id);
                $data["password"] = hash::make($data["password"]);
                $users->password = $data['password'];
                if ($users->save()) {
                    return back()->with('success', 'Thông tin đã được lưu lại');
                } else {
                    return back()->with('error', 'Đã có lỗi xảy ra, xin vui lòng thử lại');
                }
            }
        }
    }

    public function getPermissionByRole($id) {
        $data = Input::get('role');
        $rolePermissions  = RolePermission::where('role_id', $id)->first();
        return response()->json($rolePermissions);
    }

    public function viewTypeProducts() {
        $type_products = TypeProduct::all();
        return view("admin.type_products.view_type_products")->with(compact('type_products'));
    }

    public function editTypeProduct($id = null){
        $typeProductDetails = TypeProduct::where('id', $id)->first();
        if (!$typeProductDetails){
            return back()->with('error', 'Dữ liệu đầu vào không hợp lệ \n Vui lòng kiểm tra lại');
        }
        return view('admin.type_products.edit_type_products')->with(compact('typeProductDetails'));
    }
    public function updateTypeProduct(TypeProductRequest $request, $id){
//        dd($request);
        $data = array_filter($request->only('name', 'description'));
        if(TypeProduct::where('id',$id)->update($data)){
            return back()->with('success', 'Thông tin đã được lưu lại');
        }
        else{
            return back()->with('error', 'Đã có lỗi xảy ra, xin vui lòng thử lại');
        }

    }




    public function addTypeProducts() {
        return view("admin.type_products.add_type_products");
    }
    public function insertTypeProducts(TypeProductRequest $request){
        $data = $request->all();
        $typeProduct = new TypeProduct;
        $typeProduct->name = $data['name'];
        $typeProduct->description = $data['description'];
        if( $typeProduct->save()){
            return back()->with('success', 'Type product has been added successfully');
        }
        else{
            return back()->with('error', 'Couldnt add a new brand');
        }
    }

    public function deleteTypeProduct($id){
        if(TypeProduct::where(['id'=>$id])->delete()){
            return back()->with('info', 'Yêu cầu đã được thực hiện');
        }
        else return back()->with('error', 'Đã có lỗi xảy ra, vui lòng thực hiện lại');
    }






    public function viewProducts() {
        $products = Product::all();
        $brands = Brand::all();
        $type_products = TypeProduct::get();
        return view('admin.products.view_products')->with(compact('products', 'brands', 'type_products'));
    }

    public function editProducts($id) {
        $product = Product::where('id', $id)->first();
        $brands = Brand::all();
        $type_products = TypeProduct::all();
        return view("admin.products.edit_products")->with(compact('product', 'brands', 'type_products'));
    }

    public function addProducts() {
        $brands = Brand::all();
        $type_products = TypeProduct::all();
        return view("admin.products.add_products")->with(compact('brands', 'type_products'));
    }

    public function insertProducts(ProductRequest $request){
        $data = $request->all();
        $product = new Product;
        $product->name = $data['name'];
        $product->unit_price = $data['unit_price'];
        $product->promotion_price = $data['promotion_price'];
        $product->description = $data['description'];
        $product->cpu = $data['cpu'];
        $product->ram = $data['ram'];
        $product->oCung = $data['oCung'];
        $product->win = $data['win'];
        $product->manHinh = $data['manHinh'];
        $product->brand_id = $data['brand_id'];
        $product->brand_id = $data['brand_id'];
        $product->type_id = $data['type_id'];
        $product->discount = $data['discount'];
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = time().rand(10,99).'.'.$extension;
                $image_path = 'images/'.$filename;
                if(!Image::make($image_tmp)->save($image_path)){
                    return back()->with('error', 'Something was wrong with image');
                }
                // Store image name in products table
                $product->image = $filename;
            }
        }
        if($product->save()){
            return redirect()->back()->with('success', 'Product has been added!');
        }
        else return redirect()->back()->with('failed', 'Coudnt add a new product, please try agian');
    }

    public function updateProducts(Request $request, $id = null){
//        dd($request);
        $data = array_filter($request->only('brand_id', 'type_id', 'name', 'win', 'cpu', 'manHinh', 'ram',
            'oCung', 'unit_price', 'promotion_price', 'description', 'discount'));
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = time().rand(10,99).'.'.$extension;
                $data['image']  =$filename;
                $image_path = 'images/'.$filename;
                if(!Image::make($image_tmp)->save($image_path)){
                    return back()->with('error', 'Something was wrong with image');
                }
                // Store image name in products table
            }
//            dd($data);
        }
        if(Product::where('id', $id)->update($data)){
            return redirect()->back()->with('success', 'Sản phẩm đã được cập nhật');
        }
        else{
            return redirect()->back()->with('failed','Đã xảy ra lỗi');
        }
    }

    public function deleteProducts($id = null){
        if(Product::where(['id'=>$id])->delete()){

            return back()->with('info', 'Product has been deleted');
        }
        else{
            return back()->with('failed', 'Couldnt delete the product');
        }
    }


    public function viewBrands() {
        $brands = Brand::all();
        return view("admin.brands.view_brands")->with(compact('brands'));
    }

    public function addBrands() {
        return view("admin.brands.add_brands");
    }

    public function insertBrands(BrandRequest $request){
        $data = $request->all();
        $brand = new Brand;
        $brand->name = $data['name'];
        $brand->description = $data['description'];
        if($request->hasFile('image_logo')){
            $image_tmp = $request->file('image_logo');
            if($image_tmp->isValid()){
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = time().rand(10,99).'.'.$extension;
                $image_path = 'images/brands-logo/'.$filename;
                if(!Image::make($image_tmp)->save($image_path)){
                    return back()->with('error', 'Something was wrong with image');
                }
                // Store image name in products table
                $brand->logo = $filename;
            }
        }

        if( $brand->save()){
            return back()->with('success', 'Brand has been added successfully');
        }
        else{
            return back()->with('error', 'Couldnt add a new brand');
        }
    }

    public function deleteBrands($id){
        if(Brand::where(['id'=>$id])->delete()){
            return back()->with('info', 'Brand has been removed');
        }
        else return back()->with('error', 'Please try again');
    }
    public function editBrands($id = null){
        $brandDetails = Brand::where('id', $id)->first();
        if (!$brandDetails){
            return back()->with('error', 'Cannot find the specific brand');
        }
        return view('admin.brands.edit_brands')->with(compact('brandDetails'));
    }
    public function updateBrands(BrandRequest $request, $id){
//        dd($request);
        $data = array_filter($request->only('name', 'description'));
        if($request->hasFile('logo')) {
            $image_tmp = $request->file('logo');
            if ($image_tmp->isValid()) {
                $extension = $image_tmp->getClientOriginalExtension();
                $filename = time() . rand(10, 99) . '.' . $extension;
                $data['logo'] = $filename;
                $image_path = 'images/brands-logo/' . $filename;
                if (!Image::make($image_tmp)->save($image_path)) {
                    return back()->with('error', 'Something was wrong with image');
                }
                // Store image name in Brands table
            }
        }
        if(Brand::where('id',$id)->update($data)){
            return back()->with('success', 'Brand info has been edited');
        }
        else{
            return back()->with('error', 'Couldnt delete the brand');
        }

    }

    public function getBills() {
        $bills = Bill::all();
        $bill_details  = BillDetail::all();
        $customers = Customer::all();
        $products = Product::all();
        return view("admin.bills.view_bills")->with(compact('bills', 'bill_details', 'customers', 'products'));
    }
    public function getBillsByStatus ($status) {
//        dd($status);
        $bills = Bill::where(['status'=>$status])->get();
//        dd($bills);
        $bill_details  = BillDetail::all();
        $customers = Customer::all();
        $products = Product::all();
        return view("admin.bills.view_bills")->with(compact('bills', 'bill_details', 'customers', 'products'));
    }

    public function deleteBill($id) {
        if(Bill::where(['id'=>$id])->delete()){
            return back()->with('info', 'Bill has been removed');
        }

        else return back()->with('error', 'Please try again');
    }

    public function updateStatusBill(Request $request, $id) {
        $data = $request->all();
        if($data['status']==3) {
            $bill_details = BillDetail::where("bill_id", $id)->get();
            foreach ($bill_details as $item) {
                $id_product = $item['product_id'];
                $quantity = $item['quantity'];
                $product = Product::where("id", $id_product)->first();
                $product->discount += $quantity;
                $product->save();
            }
        }
        Bill::where('id',$id)->update(['status'=>$data['status']]);
    }

    public function viewSlide() {
        $slides = Slide::all();
        return view("admin.slides.view_slides")->with(compact('slides'));
    }

}
