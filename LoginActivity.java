package com.example.admin.bellezatimes;

/**
 * Created by ADMIN on 01-12-2016.
 */

import android.app.Fragment;
import android.app.FragmentTransaction;
import android.content.SharedPreferences;
import android.support.v7.widget.AppCompatButton;
import android.os.Bundle;
import android.util.Log;
import android.widget.Toast;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;


import com.example.admin.bellezatimes.ServerRequest;
import com.example.admin.bellezatimes.ServerResponse;
import com.example.admin.bellezatimes.User;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class LoginActivity extends Fragment implements View.OnClickListener{
    private AppCompatButton btLogin;
    private EditText etUserName,etEmail,etPassword;
    private TextView tvLogin;
    private ProgressBar progressBar;
    private SharedPreferences preferences;

    @Override
    public View onCreateView(LayoutInflater layoutInflater,ViewGroup container,Bundle savedInstanceState){
        View view = layoutInflater.inflate(R.layout.login_activity,container,false);
        initViews(view);
        return view;
    }

    public void initViews(View view){
        preferences = getActivity().getPreferences(0);

        btLogin = (AppCompatButton) view.findViewById(R.id.button);
        etUserName = (EditText)view.findViewById(R.id.editText);
        etPassword = (EditText)view.findViewById(R.id.editText2);
        etEmail = (EditText)view.findViewById(R.id.editText3);
        tvLogin = (TextView)view.findViewById(R.id.textView);
        progressBar = (ProgressBar)view.findViewById(R.id.progressBar);

        btLogin.setOnClickListener(this);

    }

    public void onClick(View v){
        switch(v.getId()){
            case R.id.button:
                String user_name = etUserName.getText().toString();
                String email = etEmail.getText().toString();
                String password = etPassword.getText().toString();

                if(!user_name.isEmpty() && !email.isEmpty() && !password.isEmpty()){
                    progressBar.setVisibility(View.VISIBLE);
                    loginProcess(user_name,email,password);
                }

                else{
                   Toast.makeText(getContext(),"Fields empty!",Toast.LENGTH_LONG).show();
                }
                break;


        }
    }

    private void loginProcess(String user_name,String email,String password){
        Retrofit retrofit = new Retrofit.Builder()
                .baseUrl(Constants.BASE_URL)
                .addConverterFactory(GsonConverterFactory.create())
                .build();

        RequestInterface requestInterface = retrofit.create(RequestInterface.class);

        User user = new User();
        user.setUser_name(user_name);
        user.setEmail(email);
        user.setPassword(password);
        ServerRequest request = new ServerRequest();
        request.setOperation(Constants.LOGIN_OPERATION);
        request.setUser(user);
        Call<ServerResponse> response = requestInterface.operation(request);
        response.enqueue(new Callback<ServerResponse>() {
            @Override
            public void onResponse(Call<ServerResponse> call, retrofit2.Response<ServerResponse> response) {
                ServerResponse response1 = response.body();
                Toast.makeText(getContext(),response1.getMessage(),Toast.LENGTH_LONG).show();
                if(response1.getResult().equals(Constants.SUCCESS)){
                    SharedPreferences.Editor editor = preferences.edit();
                    editor.putBoolean(Constants.IS_LOGGED_IN,true);
                    editor.putString(Constants.USER_NAME,response1.getUser().getUser_name());
                    editor.putString(Constants.EMAIL,response1.getUser().getEmail());
                    editor.putString(Constants.PASSWORD,response1.getUser().getPassword());
                    editor.apply();
                    goToFeed();
                }
                progressBar.setVisibility(View.INVISIBLE);
            }



            @Override
            public void onFailure(Call<ServerResponse> call, Throwable t) {
                progressBar.setVisibility(View.INVISIBLE);
                Log.d(Constants.TAG,"falied");
                Toast.makeText(getContext(),t.getLocalizedMessage(),Toast.LENGTH_LONG).show();
            }
        });
    }

    private void goToFeed(){
        Fragment feed = new FeedPage();
        FragmentTransaction fragmentTransaction = getFragmentManager().beginTransaction();
        fragmentTransaction.replace(R.id.fragment_frame,feed);
        fragmentTransaction.commit();

    }

}


































/*import android.app.ProgressDialog;
import android.content.Intent;
//import android.content.SharedPreferences;
import android.net.Uri;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;



public class LoginActivity extends AppCompatActivity {
    Button b1,b2;
    private EditText etUserName;
    private EditText etPassword;
    private EditText etEmail;

    public static final int CONNECTION_TIMEOUT = 10000;
    public static final int READ_TIMEOUT = 15000;
    TextView tv1;

    @Override
    public void onCreate(Bundle savedInstance) {
        super.onCreate(savedInstance);
        setContentView(R.layout.login_activity);

        b1 = (Button) findViewById(R.id.button4);
        b2 = (Button) findViewById(R.id.button5);
        etUserName = (EditText) findViewById(R.id.editText);
        etPassword = (EditText) findViewById(R.id.editText2);
        etEmail = (EditText) findViewById(R.id.editText4);
        tv1 = (TextView) findViewById(R.id.textView);
        tv1.setVisibility(View.GONE);

    }

    public void checkLogin(View view){
        final String uname = etUserName.getText().toString();
        final String email = etEmail.getText().toString();
        final String pass = etPassword.getText().toString();


        new AsyncLogin().execute(uname,email,pass);
    }

    private class AsyncLogin extends AsyncTask<String,String,String>{

        ProgressDialog progressDialog = new ProgressDialog(LoginActivity.this);
        HttpURLConnection connection;
        URL url = null;

        @Override
        protected void onPreExecute(){
            super.onPreExecute();

            progressDialog.setMessage("\tLoading....");
            progressDialog.setCancelable(false);
            progressDialog.show();
        }

        @Override
        protected String doInBackground(String... params){
            // Setup HttpURLConnection class to send and receive data from php and mysql
            try{
                url = new URL("http://10.0.2.2/SMS/login/");

            }
            catch (MalformedURLException e){
                e.printStackTrace();
                return "URL not found!";
            }

            try{
                connection = (HttpURLConnection)url.openConnection();
                connection.setReadTimeout(READ_TIMEOUT);
                connection.setConnectTimeout(CONNECTION_TIMEOUT);
                connection.setRequestMethod("POST");

                // setDoInput and setDoOutput method depict handling of both send and receive
                connection.setDoInput(true);
                connection.setDoOutput(true);
                // Append parameters to URL
                Uri.Builder builder = new Uri.Builder()
                        .appendQueryParameter("username",params[0])
                        .appendQueryParameter("email",params[1])
                        .appendQueryParameter("password",params[2]);
                String query = builder.build().getEncodedQuery();

                OutputStream outputStream = connection.getOutputStream();
                BufferedWriter bufferedWriter = new BufferedWriter(new OutputStreamWriter(outputStream,"UTF-8"));
                bufferedWriter.write(query);
                bufferedWriter.flush();
                bufferedWriter.close();
                outputStream.close();
                connection.connect();
            }
            catch (IOException e1){
                e1.printStackTrace();
                return "Connection problem";

            }

            try{
                int response_code = connection.getResponseCode();
                // Check if successful connection made
                if(response_code == HttpURLConnection.HTTP_OK){
                    InputStream input = connection.getInputStream();
                    BufferedReader reader = new BufferedReader(new InputStreamReader(input));
                    StringBuilder result = new StringBuilder();
                    String line;

                    while((line = reader.readLine())!=null){
                        result.append(line);
                    }
                    // Pass data to onPostExecute method
                    return (result.toString());
                }
                else{
                    return ("Unsuccessful");
                }

            }
            catch (IOException e){
                e.printStackTrace();
                return "No response";
            }
            finally {
                connection.disconnect();
            }
        }

        @Override
        protected void onPostExecute(String result){
            //this method will be running on UI thread

            progressDialog.dismiss();

            if(result.equalsIgnoreCase("true")){
                  Here launching another activity when login successful. If you persist login state
                use sharedPreferences of Android. and logout button to clear sharedPreferences.


                Intent intent = new Intent(LoginActivity.this,FeedPage.class);
                startActivity(intent);
                LoginActivity.this.finish();
            }

            else if(result.equalsIgnoreCase("false")){
                // If username and password does not match display a error message

                Toast.makeText(LoginActivity.this,"Invalid username or password",Toast.LENGTH_LONG).show();
            }

            else if(result.equalsIgnoreCase("URL not found!")){
                Toast.makeText(LoginActivity.this,"URL not found!",Toast.LENGTH_LONG).show();
            }
            else if(result.equalsIgnoreCase("Connection problem")){
                Toast.makeText(LoginActivity.this,"Connection problem",Toast.LENGTH_LONG).show();
            }
            else if(result.equalsIgnoreCase("No response")){
                Toast.makeText(LoginActivity.this,"No response",Toast.LENGTH_LONG).show();
            }

        }
    }

}

*/