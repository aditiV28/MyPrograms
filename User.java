package com.example.admin.bellezatimes;

/**
 * Created by ADMIN on 23-12-2016.
 */

public class User {
    private String user_name;
    private String email;
    private String password;
    private String new_password;

    public String getUser_name(){
        return user_name;
    }

    public String getEmail(){
        return email;
    }

    public String getPassword(){
        return password;

    }

    public String getNew_password(){
        return new_password;
    }

    public void setUser_name(String user_name){
        this.user_name = user_name;
    }

    public void setEmail(String email){
        this.email = email;
    }

    public void setPassword(String password){
        this.password = password;
    }

    public void setNew_password(String new_password){
        this.new_password = new_password;
    }
}
