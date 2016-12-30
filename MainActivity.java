package com.example.admin.bellezatimes;
//http://stackoverflow.com/questions/5778187/change-the-look-of-edit-text-box-in-android
//http://stackoverflow.com/questions/3646415/how-to-create-edittext-with-rounded-corners

/**
 * Created by ADMIN on 01-12-2016.
 */

import android.nfc.Tag;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.Button;
import android.widget.TextView;
import android.content.Intent;
import android.widget.Toast;


import com.example.admin.bellezatimes.R;

import okhttp3.Call;
import okhttp3.Callback;
import okhttp3.FormBody;
import okhttp3.OkHttpClient;
import okhttp3.Request;
import okhttp3.RequestBody;
import okhttp3.Response;

import java.io.IOException;

public class MainActivity extends AppCompatActivity {
    public static final String TAG = "MYTAG";
    private static final String BASE_URL = "http://10.0.2.2/SMS/login/";
    private OkHttpClient okHttpClient = new OkHttpClient();

    Button login,cancel;
    private EditText etUserName;
    private EditText etPassword;
    private EditText etEmail;

    /*public static final int CONNECTION_TIMEOUT = 10000;
    public static final int READ_TIMEOUT = 15000;*/
    TextView tv1;

    @Override
    public void onCreate(Bundle savedInstance) {
        super.onCreate(savedInstance);
        setContentView(R.layout.login_activity);

        login = (Button) findViewById(R.id.button4);
        cancel = (Button) findViewById(R.id.button5);
        etUserName = (EditText) findViewById(R.id.editText);
        etPassword = (EditText) findViewById(R.id.editText2);
        etEmail = (EditText) findViewById(R.id.editText3);
        tv1 = (TextView) findViewById(R.id.textView);
        tv1.setVisibility(View.GONE);
        login.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View v){
                String user_name = etUserName.getText().toString();
                String email = etEmail.getText().toString();
                String password = etPassword.getText().toString();
                login(user_name,email,password);
            }
        });
    }

    public void login(String user_name,String email,String password){
        RequestBody requestBody = new FormBody.Builder()
                .add("user_name",user_name)
                .add("email",email)
                .add("password",password)
                .build();
        Request request = new Request.Builder().url(BASE_URL).post(requestBody).build();
        Call call = okHttpClient.newCall(request);
        call.enqueue(new Callback() {
            @Override
            public void onFailure(Call call, IOException e) {
                Toast.makeText(MainActivity.this,"Login error!!" + e.getMessage(),Toast.LENGTH_LONG).show();


            }


            @Override
            public void onResponse(Call call, Response response) throws IOException {
                try{
                    String resp = response.body().string();
                    System.out.print(resp);
                    Log.e(TAG,resp);
                    
                   // Toast.makeText(MainActivity.this,"Done"+resp,Toast.LENGTH_LONG).show();

                }
                catch (IOException e){
                    Toast.makeText(MainActivity.this,e.getMessage(),Toast.LENGTH_LONG).show();
                }
            }
        });
    }




}

