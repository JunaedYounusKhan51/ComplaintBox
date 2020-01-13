package com.example.complaintbox;

import android.app.Activity;

import android.os.Bundle;
import android.view.Menu;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.app.Activity;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.os.Parcelable;
import android.provider.MediaStore;
import android.view.KeyEvent;
import android.webkit.ConsoleMessage;
import android.webkit.ValueCallback;
import android.webkit.WebChromeClient;
import android.webkit.WebSettings.PluginState;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Toast;
import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;

public class MainActivity extends Activity {
	
	 WebView webView;
    final Activity activity = this;
    public Uri imageUri;

    private static final int FILECHOOSER_RESULTCODE   = 2888;
    private ValueCallback<Uri> mUploadMessage;
    private Uri mCapturedImageURI = null;
	
    @Override
    protected void onCreate(Bundle savedInstanceState) {
    	
    	super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        //Get webview
        webView = (WebView) findViewById(R.id.webview1);
        // Define url that will open in webview
        String webViewUrl = "http://192.168.128.1/cb/login.php";
        // Javascript inabled on webview
        webView.getSettings().setJavaScriptEnabled(true);
        // Other webview options
        webView.getSettings().setLoadWithOverviewMode(true);
        webView.setScrollBarStyle(WebView.SCROLLBARS_OUTSIDE_OVERLAY);
        webView.setScrollbarFadingEnabled(false);
        webView.getSettings().setBuiltInZoomControls(true);
        webView.getSettings().setPluginState(PluginState.ON);
        webView.getSettings().setAllowFileAccess(true);
        webView.getSettings().setSupportZoom(true);

        //Load url in webview
        webView.loadUrl(webViewUrl);
       // WebSettings webSettings = webView.getSettings();
	    //webSettings.setJavaScriptEnabled(true);
        startWebView();
    	
    	
    	/*
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        
        WebView browser = (WebView) findViewById(R.id.webview1);
        browser.setWebViewClient(new MyBrowser());
        browser.loadUrl("http://192.168.128.1/cb/login.php");
        WebSettings webSettings = browser.getSettings();
	    webSettings.setJavaScriptEnabled(true);
	    
	    */
        
	    
    }
    

    private class MyBrowser extends WebViewClient {
 	   @Override
 	   public boolean shouldOverrideUrlLoading(WebView view, String url) {
 	      view.loadUrl(url);
 	      return true;
 	   }
 	}

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main, menu);
        return true;
    }
    
    private void startWebView() {
        webView.setWebViewClient(new WebViewClient() {
         public boolean shouldOverrideUrlLoading(WebView view, String url) {
             view.loadUrl(url);
             return true;
         }});
        
        webView.setWebViewClient(new WebViewClient() {
            public boolean shouldOverrideUrlLoading(WebView view, String url) {
                if (url.startsWith("tel:")) { 
                        Intent intent = new Intent(Intent.ACTION_DIAL, Uri.parse(url)); 
                        startActivity(intent); 
                        return true;
                }
                return false;
            }           
        });

         webView.setWebChromeClient(new WebChromeClient() {
             // openFileChooser for Android 3.0+
             public void openFileChooser(ValueCallback<Uri> uploadMsg, String acceptType) {
                 // Update message
                 mUploadMessage = uploadMsg;
                 try {
                   // Camera capture image intent
                     final Intent captureIntent = new Intent(
                             MediaStore.ACTION_IMAGE_CAPTURE);
                     captureIntent.putExtra(MediaStore.EXTRA_OUTPUT, mCapturedImageURI);
                     Intent i = new Intent(Intent.ACTION_GET_CONTENT);
                     i.addCategory(Intent.CATEGORY_OPENABLE);
                     i.setType("image/*");
                     // Create file chooser intent
                     Intent chooserIntent = Intent.createChooser(i, "Image Chooser");
                     // Set camera intent to file chooser
                     chooserIntent.putExtra(Intent.EXTRA_INITIAL_INTENTS
                             , new Parcelable[]{captureIntent});

                     // On select image call onActivityResult method of activity
                     startActivityForResult(chooserIntent, FILECHOOSER_RESULTCODE);

                 } catch (Exception e) {
                     Toast.makeText(getBaseContext(), "Exception:" + e,
                             Toast.LENGTH_LONG).show();
                 }
             }
             // openFileChooser for Android < 3.0
             public void openFileChooser(ValueCallback<Uri> uploadMsg) {
                 openFileChooser(uploadMsg, "");
             }
             //openFileChooser for other Android versions
             public void openFileChooser(ValueCallback<Uri> uploadMsg,
                                         String acceptType,
                                         String capture) {

                 openFileChooser(uploadMsg, acceptType);
             }
             public boolean onConsoleMessage(ConsoleMessage cm) {

                 onConsoleMessage(cm.message(), cm.lineNumber(), cm.sourceId());
                 return true;
             }

             public void onConsoleMessage(String message, int lineNumber, String sourceID) {
                 //Log.d("androidruntime", "Show console messages, Used for debugging: " + message);

             }
         });   // End setWebChromeClient

     }
    
    // Return here when file selected from camera or from SDcard
    @Override
    protected void onActivityResult(int requestCode, int resultCode,Intent intent) {
        if(requestCode==FILECHOOSER_RESULTCODE)
        {
            if (null == this.mUploadMessage) {
                return;
            }
            Uri result=null;
            try{
                if (resultCode != RESULT_OK) {
                    result = null;
                } else {
                    // retrieve from the private variable if the intent is null
                    result = intent == null ? mCapturedImageURI : intent.getData();
                }
            }
            catch(Exception e)
            {
                Toast.makeText(getApplicationContext(), "activity :"+e,
                        Toast.LENGTH_LONG).show();
            }
            mUploadMessage.onReceiveValue(result);
            mUploadMessage = null;
        }
    }
    
 // Open previous opened link from history on webview when back button pressed
    @Override
    public boolean onKeyDown(int keyCode, KeyEvent event)
    {
        if ((keyCode == KeyEvent.KEYCODE_BACK) && webView.canGoBack()) {
            webView.goBack();
            return true;
        }
        return super.onKeyDown(keyCode, event);
    }
    
    @Override
    // Detect when the back button is pressed
    public void onBackPressed() {
        if(webView.canGoBack()) {
            webView.goBack();
  } else {
            // Let the system handle the back button
            super.onBackPressed();
        }
    }
    
    
    
}
