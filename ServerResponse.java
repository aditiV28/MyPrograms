package com.example.admin.bellezatimes;

/**
 * Created by ADMIN on 23-12-2016.
 */

public class ServerResponse {
    private String result;
    private String message;
    private User user;

    public String getResult(){
        return result;
    }

    public String getMessage(){
        return message;
    }

    public User getUser(){
        return user;
    }
}
